<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Amenity\CreateAmenityRequest;
use App\Http\Requests\Amenity\UpdateAmenityRequest;
use App\Services\AmenityService;
use App\Traits\ResponseTrait;
use App\Http\Resources\AmenityResource;

class AmenityController extends Controller
{
    //
    use ResponseTrait;

    protected $AmenityService;
    
    public function __construct(AmenityService $AmenityService){
        $this->AmenityService = $AmenityService;
    }

    public function create(CreateAmenityRequest $request){
        try{
            $data = $this->AmenityService->create($request->all());
            return $this->success(new AmenityResource($data),"Amenity registered successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function update($id,UpdateAmenityRequest $request){
        try{
            $data = $this->AmenityService->update($id,$request->all());
            return $this->success(new AmenityResource($data),"Amenity updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function all(){
        try{
            $data = $this->AmenityService->all();
            return $this->success(AmenityResource::collection($data),"Amenities fetched successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function get($id){
        try{
            $data = $this->AmenityService->get($id);
            return $this->success(new AmenityResource($data),"Amenity updated successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }
}
