<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyType\CreatePropertyTypeRequest;
use App\Http\Requests\PropertyType\UpdatePropertyTypeRequest;
use App\Services\PropertyTypeService;
use App\Traits\ResponseTrait;
use App\Http\Resources\PropertyTypeResource;

class PropertyTypeController extends Controller
{
    //
    use ResponseTrait;

    protected $PropertyTypeService;
    
    public function __construct(PropertyTypeService $PropertyTypeService){
        $this->PropertyTypeService = $PropertyTypeService;
    }

    public function create(CreatePropertyTypeRequest $request){
        try{
            $data = $this->PropertyTypeService->create($request->all());
            return $this->success(new PropertyTypeResource($data),"Property Type registered successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function update($id,UpdatePropertyTypeRequest $request){
        try{
            $data = $this->PropertyTypeService->update($id,$request->all());
            return $this->success(new PropertyTypeResource($data),"Property Type updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function all(){
        try{
            $data = $this->PropertyTypeService->all();
            return $this->success(PropertyTypeResource::collection($data),"Property Types fetched successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function get($id){
        try{
            $data = $this->PropertyTypeService->get($id);
            return $this->success(new PropertyTypeResource($data),"Property Type updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }
}
