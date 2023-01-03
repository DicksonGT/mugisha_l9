<?php

namespace App\Http\Controllers;

use Activation;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use File;
use Hash;
use Illuminate\Http\Request;
use Lang;
use Mail;
use Redirect;
use Reminder;
use Sentinel;
use URL;
use View;
use App\Models\Member;

class FrontEndController extends JoshController
{

    /*
     * $user_activation set to false makes the user activation via user registered email
     * and set to true makes user activated while creation
     */
    private $user_activation = true;

    /**
     * Account sign in.
     *
     * @return View
     */
    public function getLogin()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('my-account');
        }

        // Show the login page
        return View::make('login');
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */
    public function postLogin(Request $request)
    {

        try {
            // Try to log the user in
            if (Sentinel::authenticate($request->only('email', 'password'), $request->get('remember-me', 0))) {
                return Redirect::route("my-account")->with('success', Lang::get('auth/message.login.success'));
            } else {
                return Redirect::to('login')->with('error', 'Username or password is incorrect.');
                //return Redirect::back()->withInput()->withErrors($validator);
            }

        } catch (UserNotFoundException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));
        } catch (NotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (UserSuspendedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended'));
        } catch (UserBannedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_banned'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended', compact('delay')));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * get user details and display
     */
    public function myAccount(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return View::make('user_account', compact('user', 'countries'));
    }

    /**
     * update user details and display
     * @param Request $request
     * @param User $user
     * @return Return Redirect
     */
    public function update(Request $request, User $user)
    {

        $user = Sentinel::getUser();

        //update values
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->dob = $request->get('dob');
        $user->bio = $request->get('bio');
        $user->gender = $request->get('gender');
        $user->country = $request->get('country');
        $user->state = $request->get('state');
        $user->city = $request->get('city');
        $user->address = $request->get('address');
        $user->postal = $request->get('postal');


        if ($password = $request->get('password')) {
            $user->password = Hash::make($password);
        }
        // is new image uploaded?
        if ($file = $request->file('pic')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $user->pic)) {
                File::delete(public_path() . $folderName . $user->pic);
            }

            //save new file path into db
            $user->pic = $safeName;

        }

        // Was the user updated?
        if ($user->save()) {
            // Prepare the success message
            $success = Lang::get('users/message.success.update');

            // Redirect to the user page
            return Redirect::route('my-account')->with('success', $success);
        }

        // Prepare the error message
        $error = Lang::get('users/message.error.update');


        // Redirect to the user page
        return Redirect::route('my-account')->withInput()->with('error', $error);


    }

    /**
     * Account Register.
     *
     * @return View
     */
    public function getRegister()
    {
        // Show the page

        $regions = \App\Models\Region::orderBy('id')->get(['name', 'id']);
        return View::make('register', compact('regions'));
    }

    public function getDistricts(Request $request)
    {
        $districts = \App\Models\District::orderBy('name')
            ->where('region_id', $request->region_id)
            ->get();
        
        if (count($districts) > 0) {
            return response()->json($districts);
        }
    }

    public function loan_form()
    {
        $loan_products = \App\Models\District::orderBy('name')
            ->get();
            
        if (\Request::route()->getName() == "crdb_loan_form") {
            return View::make('crdb_loan_form', compact('loan_products'));
        }else{
            return View::make('akiba_loan_form', compact('loan_products'));
        }
        
        return response()->json($loan_products);
    }

    public function mfi_loan_form()
    {
        $loan_products = \App\Models\District::orderBy('name')
            ->get();
        return View::make('mfi_loan_form', compact('loan_products'));
    }


    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postRegister(UserRequest $request)
    {

        $dob = date('Y-m-d',strtotime($request->year.'-'.$request->month.'-'.$request->day));

        $user_data['email'] = $request->phone_number."@gbiasharasol.com";
        $user_data['first_name'] = $request->first_name;
        $user_data['second_name'] = $request->second_name;
        $user_data['last_name'] = $request->last_name;
        $user_data['gender'] = $request->gender;
        $user_data['dob'] = $dob;
        $user_data['region_id'] = $request->region;
        $user_data['district_id'] = $request->district;
        $user_data['phone_number'] = $request->phone_number;
        $user_data['nida_number'] = $request->nida_number;
        $user_data['employment_status'] = $request->employment_status;
        $user_data['employer'] = $request->employer;
        $user_data['password'] = $request->password;

        $activate = $this->user_activation; //make it false if you don't want to activate user automatically it is declared above as global variable

        try {

            $credentials = [
                    'login' => $user_data['email'],
                ];

            $user_exists = Sentinel::findUserByCredentials($credentials);

            if ($user_exists != null) {
                $this->messageBag->add('phone_number', 'Namba ya simu tayari imesajiliwa.');

                return redirect()->back()
                    ->withInput($request->input())
                   ->withErrors($this->messageBag);
            }

            // Register the user
            $user = Sentinel::register($user_data, $activate);

            return;
            //return $user;
            //create member after user
            member::create($user_data);
            
            //add user to 'User' group
            $role = Sentinel::findRoleByName('User');
            $role->users()->attach($user);

            //if you set $activate=false above then user will receive an activation mail
            /*if (!$activate) {
                // Data to be used on the email view
                $data = array(
                    'user' => $user,
                    'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
                );

                // Send the activation code through email
                Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                    $m->subject('Welcome ' . $user->first_name);
                });

                //Redirect to login page
                return Redirect::to("login")->with('success', Lang::get('auth/message.signup.success'));
            }*/
            // login user automatically
            Sentinel::login($user, true);

            // Redirect to the home page with success menu
            return Redirect::route("user_home")->with('success', Lang::get('auth/message.signup.success'));
            //return View::make('user_account')->with('success', Lang::get('auth/message.signup.success'));

        } catch (\Cartalyst\Sentry\Users\UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     *
     */
    public function getActivate($userId, $activationCode)
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('my-account');
        }

        $user = Sentinel::findById($userId);

        if (Activation::complete($user, $activationCode)) {
            // Activation was successfull
            return Redirect::route('login')->with('success', Lang::get('auth/message.activate.success'));
        } else {
            // Activation not found or not completed.
            $error = Lang::get('auth/message.activate.error');
            return Redirect::route('login')->with('error', $error);
        }
    }

    /**
     * Forgot password page.
     *
     * @return View
     */
    public function getForgotPassword()
    {
        // Show the page
        return View::make('forgotpwd');

    }

    /**
     * Forgot password form processing page.
     * @param Request $request
     * @return Redirect
     */
    public function postForgotPassword(Request $request)
    {
        try {
            // Get the user password recovery code
            //$user = Sentinel::FindByLogin($request->get('email'));
            $user = Sentinel::findByCredentials(['email' => $request->email]);
            if (!$user) {
                return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
            }

            $activation = Activation::completed($user);
            if (!$activation) {
                return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_activated'));
            }

            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            // Data to be used on the email view
            $data = array(
                'user' => $user,
                //'forgotPasswordUrl' => URL::route('forgot-password-confirm', $user->getResetPasswordCode()),
                'forgotPasswordUrl' => URL::route('forgot-password-confirm', [$user->id, $reminder->code]),
            );

            // Send the activation code through email
            Mail::send('emails.forgot-password', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Account Password Recovery');
            });
        } catch (UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
        return Redirect::to(URL::previous())->with('success', Lang::get('auth/message.forgot-password.success'));
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($userId, $passwordResetCode = null)
    {
        if (!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
        }

        if($reminder = Reminder::exists($user))
        {
            if($passwordResetCode == $reminder->code)
            {
                return View::make('forgotpwd-confirm', compact(['userId', 'passwordResetCode']));
            }
            else{
                return 'code does not match';
            }
        }
        else
        {
            return 'does not exists';
        }


        // Show the page
     //   return View::make('forgotpwd-confirm', compact(['userId', 'passwordResetCode']));
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param  string $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null)
    {

        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('login')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
        }

        // Password successfully reseted
        return Redirect::route('login')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
    }

    /**
     * Contact form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postContact(Request $request)
    {

        // Data to be used on the email view
        $data = array(
            'contact-name' => $request->get('contact-name'),
            'contact-email' => $request->get('contact-email'),
            'contact-msg' => $request->get('contact-msg'),
        );

        // Send the activation code through email
        Mail::send('emails.contact', compact('data'), function ($m) use ($data) {
            $m->from($data['contact-email'], $data['contact-name']);
            $m->to('email@domain.com', @trans('general.site_name'));
            $m->subject('Received a mail from ' . $data['contact-name']);

        });

        //Redirect to contact page
        return Redirect::to("contact")->with('success', Lang::get('auth/message.contact.success'));
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return Redirect::to('login')->with('success', 'You have successfully logged out!');
    }


}
