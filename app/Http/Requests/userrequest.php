<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'=>'required',
            'useremail'=>'required',
            'image'=>'required',
            'userpass'=>'required',
            'userrole'=>'required',
            'userstatus'=>'required',
        ];
    }
}
