<?php

namespace App\Http\Requests\ApartmentInfo;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CreateApartmentInfoRequest extends FormRequest
{
    use ResponseTrait,EncryptionTrait;

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
            //
            "address"=>"required",
            "city"=>"required",
            "state"=>"required",
            "property_type_id"=>"required|exists:property_types,id",
            "maximum_nights"=>"integer",
            "minimum_nights"=>"integer",
            "check_in_time_from"=>"required",
            "check_in_time_to"=>"required",
            "same_day_bookings"=>"required",
            "price"=>"required",

        ];
    }


    protected function prepareForValidation(){
        try{
            if($this->request->has("property_type_id")){
                $this->merge([
                    "property_type_id"=>$this->decrypt($this->property_type_id)
                ]);
            }
        }catch(\Exception $e){
            // return $this->error($e->getMessage(),$this->code422);
            throw new HttpResponseException($this->error($e->getMessage(),$this->code422));
        }
        
    }


    /**
     * Throws an exception that shows the error messages
     *
     * @return exception
     */
    protected function failedValidation(Validator $validator)
    {
       throw new HttpResponseException($this->error($validator->errors(),$this->code422)) ;
       
    }
}
