<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJobApplicationRequest extends FormRequest
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
            $method = $this->method();
            if ($method === 'PUT') {
                return [
                    'resume' => ['sometimes','required', 'string'],
                    'cover_letter' => ['sometimes','required', 'string'],
                    'status' => ['sometimes','required', Rule::in(['pending', 'approved', 'rejected'])],
                ];
            }
            return [
                //
                'resume' => ['sometimes','string'],
                'cover_letter' => ['sometimes','string'],
                'status' => ['sometimes',Rule::in(['pending', 'approved', 'rejected'])],
            ];
        }catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function prepareForValidation()
    {
        $this->merge([
            'cover_letter' => $this->input('coverLetter'),
        ]);
    }
}
