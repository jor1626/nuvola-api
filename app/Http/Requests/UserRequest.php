<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            case 'POST':
                return [
                    'name' => 'required',
                    'surnames' => 'required',
                    'email' => 'required|email|unique:users',
                    'address' => 'required',
                    'phone' => 'required|unique:users',
                    'img_path' => 'nullable'
                ];;

            case 'PUT':
                return [
                    'name' => 'required',
                    'surnames' => 'required',
                    'email' => 'required|email|unique:users, email,'.$this->id,
                    'address' => 'required',
                    'email' => 'required|unique:users, phone,'.$this->id,
                    'img_path' => 'nullable'
                ];
        }
    }
}
