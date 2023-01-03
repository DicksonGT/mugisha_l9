<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Support\Facades\Request;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Illuminate\Support\Facades\Input;
use Response;

class UsersController extends JoshController
{

    /**
     * Show a list of all the users.
     *
     * @return View
     */
    public function index()
    {
        // Grab all the users
        $users = User::All();

        // Show the page
        return View('admin.users.index', compact('users'));
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function create()
    {
        // Get all the available groups
        $groups = Sentinel::getRoleRepository()->all();

        $countries = $this->countries;
        // Show the page
        return View('admin/users/create', compact('groups', 'countries'));
    }

    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function store(UserRequest $request)
    {

        /*//upload image
        if ($file = $request->file('pic_file')) {
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request['pic'] = $safeName;
            echo($safeName);
        }else{
            echo("arg1")
        }*/
        //check whether use should be activated by default or not
        $activate = $request->get('activate') ? true : false;

        try {
            // Register the user
            $user = Sentinel::register($request->except('_token', 'password_confirm', 'group', 'activate', 'pic_file'), $activate);

            //add user to 'User' group
            $role = Sentinel::findRoleById($request->get('group'));
            if ($role) {
                $role->users()->attach($user);
            }
            //check for activation and send activation mail if not activated by default
            if (!$request->get('activate')) {
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
            }

            // Redirect to the home page with success menu
            return Redirect::route('users.index')->with('success', Lang::get('users/message.success.create'));

        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/users/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/users/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/users/message.user_exists');
        }

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }



    public function add(Request $request)
    {
        
        try {

            $data = Input::all();
            /*$user_data['phone_number'] = $data['phone_number'];*/
            $user_data['user_code'] = $data['user_code'];
            $user_data['first_name'] = $data['first_name'];
            $user_data['last_name'] = $data['last_name'];
            $user_data['phone_number'] = $data['phone_number'];
            $user_data['user_type'] = $data['user_type'];
            $user_data['promo_code'] = $data['promo_code'];
            $user_data['activation_code'] = $data['activation_code'];
            $user_data['activation_date'] = $data['activation_date'];
            $user_data['email'] = $data['user_code']."@ipo.co.tz";

            if ($data['activation_status'] == "Activated Not-Registered") {
                $user_data['activated'] = "Activated Registered";
            }
            

            if(array_key_exists('pic', $data)){
                if (strlen($data['pic']) > 5) {
                    $user_data['pic'] = "uploads/users/".$data['pic'];
                }
            }

            $resp_status = false;
            $user = User::create($user_data);
            
            if ($user->save()){
                $resp_status = true;

            }else{
                $resp_status = false;
            }

            
            $group_data = array(
               'group_code' => $data['group_code'],
               'name' => $data['group_name'],
               'location' => $data['location'],
               'type' => $data['user_type'],
               'admin_id' => Member::max('id')+1
            );

            $group = Group::create($group_data);

            if ($group->save()) {
                $resp_status = true;
            }else{
                $resp_status = false;
            }

            $member_data = array(
                'member_number' => $data['user_code'],
                'group_id' => $group->id,
                'full_name' => $data['first_name']." ". $data['last_name'],
                'phone_number' => $data['phone_number'],
                'document_number' => $data['dl_number'],
                'document_type' => $data['document_type'],
                'image1' => $data['dl_image'],
                'residence' => $data['location']
            );

            $member = Member::create($member_data);
            
            if ($member->save()) {
                $resp_status = true;
            }else{
                $resp_status = false;
            }

            if ($data['reg_number'] = "" || strlen($data['reg_number']) < 6) {
                $data['reg_number'] = "T000 ZZZ";
            }

            $vtype = "";

            if(stripos($data['reg_number'], "B")){
                $vtype = "Bajaji";
            }elseif (stripos($data['reg_number'], "MC")) {
                $vtype = "Motorbike";
            }else{
                $vtype = "Other vehicle";
            }

            $vehicle_data = array(
                'reg_number' =>$data['reg_number'],
                'type' => $vtype,
                'member_id' => $member->id,
                'card_image' =>$data['card_image']
            );

            $vehicle = Vehicle::create($vehicle_data);
            $vehicle_id = $vehicle->save();
            

            if ($resp_status) {
            
                return Response::json(array(
                    'resp_code' => $GLOBALS['success'],
                    "resp_desc" => "success"
                    ));
            }else{
                return Response::json(array(
                    'server_code' => http_response_code(),
                    'resp_code' => $GLOBALS['general server error'],
                    "resp_desc" => "error ".http_response_code()
                    ));   
            }

        } catch (Exception $e) {
              return Response::json(array(
                'server_code' => http_response_code(),
                'resp_desc' => $e
                ));
        }
    }

    public function update_activation(Request $request)
    {
        $user = User::where('user_code', '=', $request::all()[0]['user_id']);
        if ($user) {
            
            $user['activation_code'] = $request::all()[0]['activation_code'];
            $user['activation_date'] = $request::all()[0]['activation_date'];
            
            $user->save();
        }else{
            return Response::json(array(
                    'server_code' => http_response_code(),
                    'resp_code' => $GLOBALS['general server error'],
                    "resp_desc" => "user not found "
                    ));
        }
    }

    public function upload_image(Request $request) {
        
    $output_file = public_path().$request->input('full_path');
    $base64_str = $request->input('image');
    $ifp = fopen($output_file, "wb");

    fwrite($ifp, base64_decode($base64_str)); 
    fclose($ifp); 

    /*$response = array('status','success');
    
    return $response;*/
    }


    public function user_activation(Request $request)
    {
        
        $user = User::findorFail($request::all()[0]['user_id']);
        //$user->activated = "1";
        //$user->activation_date =  Date();
        $user->activation_code = md5(Date("12/12/2017"));

        $user->save();
        Activation::complete($user, md5(Date("12/12/2017")));

    }

    /**
     * User update.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        // Get this user groups
        $userRoles = $user->getRoles()->pluck('name', 'id')->all();

        // Get a list of all the available groups
        $roles = Sentinel::getRoleRepository()->all();

        $status = Activation::completed($user);

        $countries = $this->countries;

        // Show the page
        return View('admin/users/edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));
    }

    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
    public function update(User $user, UserRequest $request)
    {

        try {
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

            if ($password = $request->has('password')) {
                $user->password = Hash::make($password);
            }


            // is new image uploaded?
            if ($file = $request->file('pic')) {
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

            //save record
            $user->save();

            // Get the current user groups
            $userRoles = $user->roles()->lists('id')->all();

            // Get the selected groups
            $selectedRoles = $request->get('groups', array());

            // Groups comparison between the groups the user currently
            // have and the groups the user wish to have.
            $rolesToAdd = array_diff($selectedRoles, $userRoles);
            $rolesToRemove = array_diff($userRoles, $selectedRoles);

            // Assign the user to groups
            foreach ($rolesToAdd as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->attach($user);
            }

            // Remove the user from groups
            foreach ($rolesToRemove as $roleId) {
                $role = Sentinel::findRoleById($roleId);

                $role->users()->detach($user);
            }

            // Activate / De-activate user
            $status = $activation = Activation::completed($user);
            if ($request->get('activate') != $status) {
                if ($request->get('activate')) {
                    $activation = Activation::exists($user);
                    if ($activation) {
                        Activation::complete($user, $activation->code);
                    }
                } else {
                    //remove existing activation record
                    Activation::remove($user);
                    //add new record
                    Activation::create($user);

                    //send activation mail
                    $data = array(
                        'user' => $user,
                        'activationUrl' => URL::route('activate', $user->id, Activation::exists($user)->code),
                    );

                    // Send the activation code through email
                    Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                        $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                        $m->subject('Welcome ' . $user->first_name);
                    });

                }
            }

            // Was the user updated?
            if ($user->save()) {
                // Prepare the success message
                $success = Lang::get('users/message.success.update');

                // Redirect to the user page
                return Redirect::route('admin.users.edit', $user)->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('user'));
            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('admin.users.edit', $user)->withInput()->with('error', $error);
    }

    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()->get();

        // Show the page
        return View('admin/deleted_users', compact('users'));
    }


    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('users/message.error.delete');

                return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('delete/user', ['id' => $user->id]);
        return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = Lang::get('admin/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('admin.users.index')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);

            // Prepare the success message
            $success = Lang::get('users/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // create activation record for user and send mail with activation link
            $data = array(
                'user' => $user,
                'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
            );

            // Send the activation code through email
            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Dear ' . $user->first_name . '! Active your account');
            });


            // Prepare the success message
            $success = Lang::get('users/message.success.restored');

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('deleted_users')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

            //get country name
            if ($user->country) {
                $user->country = $this->countries[$user->country];
            }

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = Lang::get('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        // Show the page
        return View('admin.users.show', compact('user'));

    }

    public function passwordreset()
    {
        if (Request::ajax()) {
            $data = Request::all();
            $user = Sentinel::getUser();
            $password = Request::get('password');
            $user->password = Hash::make($password);
            $user->save();

        }
    }
}
