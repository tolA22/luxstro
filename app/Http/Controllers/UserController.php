<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\LoginUserRequest;
use App\Services\UserService;
use App\Traits\ResponseTrait;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    use ResponseTrait;

    protected $UserService;
    
    public function __construct(UserService $UserService){
        $this->UserService = $UserService;
    }

    public function register(RegisterUserRequest $request){
        try{
            $data = $this->UserService->register($request->all());
            return $this->success($data,"User registered successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }


    public function login(LoginUserRequest $request){
        try{
            $data = $this->UserService->login($request->all());
            return $this->success($data,"User logged in successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function all(){
        try{
            $data = $this->UserService->all($request->all());
            return $this->success(UserResource::collection($data),"Users fetched successfully",200);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function get($id){
        try{
            $data = $this->UserService->get($request->all());
            return $this->success(new UserResource($data),"User updated successfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }

    public function registrationStep($val){
        try{
            $request = [
                "reg_step"=>$val
            ];
            $data = $this->UserService->update($request);
            return $this->success(new UserResource($data),"Registration Step updated succesfully",201);
        }catch(\Exception $e){
            return $this->error($e->getMessage(),$this->code422);
        }
    }
    
}
