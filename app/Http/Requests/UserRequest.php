<?php

namespace App\Http\Requests;

class UserRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                    'phone_number' => 'required|min:7',
                    'password' => 'required|between:3,32',
                    'password_confirm' => 'required|same:password'

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                    'phone_number' => 'required|min:7',
                    'password' => 'between:3,32',
                    'password_confirm' => 'between:3,32|same:password',
                    'pic' => 'mimes:jpg,jpeg,bmp,png|max:10000',
                ];
            }
            default:
                break;
        }

        return [

        ];
    }


}

