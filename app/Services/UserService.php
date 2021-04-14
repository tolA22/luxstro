<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\User\UserRepository;

 
class UserService
{
    use ResponseTrait;

    protected $UserRepository;

    public function __construct(UserRepository $UserRepository){
        $this->UserRepository = $UserRepository;
    }

    public function findByColumnModel($request){
        return $this->UserRepository->findByColumn($request);
    }
    
    public function comment($request){
        // get the user using the id
        $user = $this->UserRepository->show($id);
        $user->comment .="\n". $request["comments"];
        // updating the user comment
        $user = $this->UserRepository->updateModel($user);
        return $user;
    }
}