<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateBooksFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | min:3| max:30| string',
            'author' => 'required | min:3| max:12| string',
            'price' => 'required | min:2| integer',
            'date' => 'required | date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A title is required, min 4 char',
            'author.required'  => 'Author name  is required, min 4 char',
            'price.required'  => 'Price is required, min 2 digit',
            'date.required'  => 'A message is required, valid date',
        ];
    }
}
