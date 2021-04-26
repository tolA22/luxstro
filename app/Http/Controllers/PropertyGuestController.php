<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyGuest\CreatePropertyGuestRequest;
use App\Http\Requests\PropertyGuest\UpdatePropertyGuestRequest;
use App\Services\PropertyGuestService;
use App\Traits\ResponseTrait;
use App\Http\Resources\PropertyGuestResource;


class PropertyGuestController extends Controller
{
    //
    use ResponseTrait;

    protected $PropertyGuestService;
    
    public function __construct(PropertyGuestService $PropertyGuestService){
        $this->PropertyGuestService = $PropertyGuestService;
    }

    public function create(CreatePropertyGuestRequest $request){
        try{
            $data = $this->PropertyGuestService->create($request->all());
            return $this->success(new PropertyGuestResource($data),"Property Guest Info registered successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function update($id,UpdatePropertyGuestRequest $request){
        try{
            $data = $this->PropertyGuestService->update($id,$request->all());
            return $this->success(new PropertyGuestResource($data),"Property Guest Info updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function all(){
        try{
            $data = $this->PropertyGuestService->all();
            return $this->success(PropertyGuestResource::collection($data),"Property Guests fetched successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function get($id){
        try{
            $data = $this->PropertyGuestService->get($id);
            return $this->success(new PropertyGuestResource($data),"Property Guest updated successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }
}
