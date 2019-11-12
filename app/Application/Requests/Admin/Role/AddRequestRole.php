<?php

namespace App\Application\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestRole extends FormRequest
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
        return [
            'name' =>'required',
            'slug' => 'required|unique:roles'
        ];
    }
}
