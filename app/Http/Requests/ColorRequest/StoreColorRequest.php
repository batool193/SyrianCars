<?php

namespace App\Http\Requests\ColorRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use CodingPartners\AutoController\Traits\ApiResponseTrait;

class StoreColorRequest extends FormRequest
{
    use ApiResponseTrait;

    // stop validation in the first failure
    protected $stopOnFirstFailure = false;


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
            'name' => ['required'],
        ];
    }

    /**
     *  method handles failure of Validation and return message
     * @param \Illuminate\Contracts\Validation\Validator $Validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return never
     */
    protected function failedValidation(Validator $Validator){
        $errors = $Validator->errors()->all();
        throw new HttpResponseException($this->errorResponse($errors,'Validation error',422));
    }

    /**
     * Get the validation messagges that returned in response.
     *
     * @return array
     */
    public function messages() {
        return [
            //
        ];
    }
}
