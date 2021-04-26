<?php

namespace App\Http\Requests\Media;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CreateMediaRequest extends FormRequest
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
            "type"=>"required",
            "upload_url"=>"required",
            "apartment_id"=>"required|exists:apartment_infos,id"

        ];
    }


    protected function prepareForValidation(){
        try{
            if($this->request->has("apartment_id")){
                $this->merge([
                    "apartment_id"=>$this->decrypt($this->apartment_id)
                ]);
            }
        }catch(\Exception $e){
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
