<?php

namespace App\Http\Requests\CarRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use CodingPartners\AutoController\Traits\ApiResponseTrait;

class StoreCarRequest extends FormRequest
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
            'user_id' => ['required'],
            'brand_id' => ['required'],
            'model_id' => ['required'],
            'color_id' => ['required'],
            'gear_id' => ['required'],
            'city_id' => ['required'],
            'fuel_id' => ['required'],
            'production_year' => ['required'],
            'engine_power' => ['required'],
            'condition' => ['required'],
            'mileage' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'plate_number' => ['required'],
            'is_available' => ['required'],
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
