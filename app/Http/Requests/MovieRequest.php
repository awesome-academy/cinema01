<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'country' => 'required',
            'director' => 'required',
            'type' => 'required',
            'producer' => 'required',
            'actor' => 'required',
            'day_start' => 'required',
            'type' => 'required',
            'content' => 'required',
            'duration' => 'required|integer',
            'status' => 'required|integer',
        ];
        if (request()->hasFile('image') || !request('movie_id'))
        {
            $rules = array_merge($rules, ['image' => 'required|image|max:2028']);
        }

        return $rules;
    }
}
