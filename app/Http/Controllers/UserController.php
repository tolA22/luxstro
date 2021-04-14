<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCommentRequest;
use App\Services\UserService;
use App\Traits\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;

    protected $UserService;
    
    public function __construct(UserService $UserService){
        $this->UserService = $UserService;
    }

    public function comment(UserCommentRequest $request){
        $data = $this->UserService->comment($request->all());
        return $this->success($data,"Comment added successfully",$this->code201);
    }

    public function viewComment($id){
        $user = $this->UserService->user($id);
        return view('welcome',["user"=>$user]);
    }
}
