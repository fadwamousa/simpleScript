<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class jobpostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required|min:10',
            'description' => 'required',
            'roles'       => 'required',
            'address'     => 'required',
            'type'        => 'required',
            'last_date'   => 'required',
            'experience'  => 'required|numeric',
            'number_of_vacancy' => 'required|numeric'

        ];
    }
}
