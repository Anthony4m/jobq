<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobApplicationRequest extends FormRequest
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
                'user_id' => ['required', 'integer'],
                'job_listing_id' => ['required', 'integer'],
                'resume' => ['required', 'string'],
                'cover_letter' => ['required', 'string'],
                'status' => ['required', Rule::in(['pending', 'approved', 'rejected'])],
            ];
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function prepareForValidation()
    {
        $this->merge([
            'job_listing_id' => $this->input('jobListingId'),
            'user_id' => $this->input('userId'),
            'cover_letter' => $this->input('coverLetter'),
        ]);
    }
}
