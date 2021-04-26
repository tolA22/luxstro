<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Media\CreateMediaRequest;
use App\Http\Requests\Media\UpdateMediaRequest;
use App\Services\MediaService;
use App\Traits\ResponseTrait;
use App\Http\Resources\MediaResource;

class MediaController extends Controller
{
    //
    use ResponseTrait;

    protected $MediaService;
    
    public function __construct(MediaService $MediaService){
        $this->MediaService = $MediaService;
    }

    public function create(CreateMediaRequest $request){
        try{
            $data = $this->MediaService->create($request->all());
            return $this->success(new MediaResource($data),"Media Info registered successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function update($id,UpdateMediaRequest $request){
        try{
            $data = $this->MediaService->update($id,$request->all());
            return $this->success(new MediaResource($data),"Media Info updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function all(){
        try{
            $data = $this->MediaService->all();
            return $this->success(MediaResource::collection($data),"Media fetched successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function get($id){
        try{
            $data = $this->MediaService->get($id);
            return $this->success(new MediaResource($data),"Media updated successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }
}
