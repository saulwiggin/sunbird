<?php

namespace App\Application\Requests\Admin\Categorie;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestCategorie extends FormRequest
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
            'name.*' => 'required|max:90'
        ];
    }
}
