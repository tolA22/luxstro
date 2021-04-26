<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Space\CreateSpaceRequest;
use App\Http\Requests\Space\UpdateSpaceRequest;
use App\Services\SpaceService;
use App\Traits\ResponseTrait;
use App\Http\Resources\SpaceResource;


class SpaceController extends Controller
{
    //
    use ResponseTrait;

    protected $SpaceService;
    
    public function __construct(SpaceService $SpaceService){
        $this->SpaceService = $SpaceService;
    }

    public function create(CreateSpaceRequest $request){
        try{
            $data = $this->SpaceService->create($request->all());
            return $this->success(new SpaceResource($data),"Space registered successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function update($id,UpdateSpaceRequest $request){
        try{
            $data = $this->SpaceService->update($id,$request->all());
            return $this->success(new SpaceResource($data),"Space updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function all(){
        try{
            $data = $this->SpaceService->all();
            return $this->success(SpaceResource::collection($data),"Spaces fetched successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function get($id){
        try{
            $data = $this->SpaceService->get($id);
            return $this->success(new SpaceResource($data),"Space updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }
}
