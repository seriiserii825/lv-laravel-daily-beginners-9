<?php

namespace App\Http\Requests\Worker;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
  protected function failedValidation(Validator $validator)
  {
      throw new HttpResponseException(response()->json([
          'errors' => $validator->errors(),
          'status' => true
      ], 422));
  }
}
