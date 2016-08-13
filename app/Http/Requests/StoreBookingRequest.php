<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreBookingRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'pickup_date' => 'required',
            'dropoff_date' => 'required'
        ];
    }
}
