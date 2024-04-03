<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        try {
        return [
            //
            'user_id' => ['required'],
            'title' => ['required'],
            'tags' => ['required'],
            'company' => ['required'],
            'email' => ['required', 'email'],
            'website' => ['required'],
            'location' => ['required'],
            'salary' => ['required'],
            'description' => ['required'],
        ];
    }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->input('userId'),
        ]);
    }

}
