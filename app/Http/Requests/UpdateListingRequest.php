<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListingRequest extends FormRequest
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
            //
        try {
            $method = $this->method();
            if ($method === 'PUT') {
                return [
                    //
                    'title' => ['sometimes','required'],
                    'tags' => ['sometimes','required'],
                    'company' => ['sometimes','required'],
                    'email' => ['sometimes','required', 'email'],
                    'website' => ['sometimes','required'],
                    'location' => ['sometimes','required'],
                    'salary' => ['sometimes','required'],
                    'description' => ['sometimes','required'],
                ];
            }
            return [
                //
                'user_id' => ['sometimes', 'integer'],
                'title' => ['sometimes', 'string'],
                'tags' => ['sometimes', 'string'],
                'company' => ['sometimes', 'string'],
                'email' => ['sometimes', 'email'],
                'website' => ['sometimes', 'string'],
                'location' => ['sometimes', 'string'],
                'salary' => ['sometimes', 'string'],
                'description' => ['sometimes', 'string'],
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
