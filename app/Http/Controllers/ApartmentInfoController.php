<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApartmentInfo\CreateApartmentInfoRequest;
use App\Http\Requests\ApartmentInfo\UpdateApartmentInfoRequest;
use App\Services\ApartmentInfoService;
use App\Traits\ResponseTrait;
use App\Http\Resources\ApartmentInfoResource;

class ApartmentInfoController extends Controller
{
    //
    use ResponseTrait;

    protected $ApartmentInfoService;
    
    public function __construct(ApartmentInfoService $ApartmentInfoService){
        $this->ApartmentInfoService = $ApartmentInfoService;
    }

    public function create(CreateApartmentInfoRequest $request){
        try{
            $data = $this->ApartmentInfoService->create($request->all());
            return $this->success(new ApartmentInfoResource($data),"Apartment Info registered successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function update($id,UpdateApartmentInfoRequest $request){
        try{
            $data = $this->ApartmentInfoService->update($id,$request->all());
            return $this->success(new ApartmentInfoResource($data),"Apartment Info updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function all(){
        try{
            $data = $this->ApartmentInfoService->all();
            return $this->success(ApartmentInfoResource::collection($data),"Apartment Infos fetched successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function get($id){
        try{
            $data = $this->ApartmentInfoService->get($id);
            return $this->success(new ApartmentInfoResource($data),"Apartment Info updated successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }
}
