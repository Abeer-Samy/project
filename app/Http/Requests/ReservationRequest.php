<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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

                'name'=>'required|max:50',
                'email'=>'required|email',
                'phoneNumber'=>'required|max:50',
                'numOfPerson'=>'required|max:50',
                'tableRes'=>'required|integer',
                'menu_id'=>'required|integer',
                'fileImage' => 'required|mimes:jpeg,png,bmp,jpg'

        ];
    }
}
