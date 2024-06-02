<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
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
        return [
            'proteinId' => ['required'],
            'brothId' => ['required'],
        ];
    }
    public function messages(): array
    {
        return [

            'proteinId.required' => 'both brothId and proteinId are required',
            'brothId.required' => 'both brothId and proteinId are required',


        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $firstErrorMessage = $errors->first();
        throw new HttpResponseException(response()->json([
            'error' =>  $firstErrorMessage
        ], 400));
    }
}
