<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'movie_id' => 'required|integer',
            'status' => 'required|integer',
        ];
        if (request()->hasFile('image') || !request('slide_id')) {
            $rules = array_merge($rules, ['image' => 'required|image|max:2028']);
        }
        if (!request('slide_id')) {
            $rules = array_merge($rules, ['movie_id' => 'unique:slides']);
        }

        return $rules;
    }
}
