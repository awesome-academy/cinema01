<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeatPriceRequest extends FormRequest
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
            'room_type_id' => 'required',
            'seat_type_id' => 'required',
            'price' => 'required|integer|min:1000',
        ];
    }
}
