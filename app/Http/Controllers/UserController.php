<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCommentRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $UserService;
    
    public function __construct(UserService $UserService){
        $this->UserService = $UserService;
    }

    public function comment(UserCommentRequest $request){
        $data = $this->UserService->comment($request->all());
    }
}
