<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
            'full_name' => 'required|max:255',
            'birthday' => 'required|before: 13 years ago',
            'age' => 'required|max:3',
            'address' => 'required|max:255',
            'education' => 'nullable|max:255',
            'specialization' => 'nullable|max:255',
            'skill' => 'nullable|max:255',
            'contact' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'A nice title is required for the post.'
        ];
    }
}
