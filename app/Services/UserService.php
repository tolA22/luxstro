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

    public function user($id){
        return $this->UserRepository->show($id);
    }

    public function comment($request){
        // get the user using the id
        $user = $this->UserRepository->show($request["id"]);
        $user->comments .=$request["comments"]."\n";
        // updating the user comment
        $user = $this->UserRepository->updateModel($user);
        return $user;
    }
}