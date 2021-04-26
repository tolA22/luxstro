<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\Space\SpaceRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;
use App\Http\Resources\SpaceResource;
 
class SpaceService
{
    use ResponseTrait,EncryptionTrait;

    protected $SpaceRepository;


    // CONST Space_INVALID_CREDENTIALS = "Invalid credentials";

    public function __construct(SpaceRepository $SpaceRepository){
        $this->SpaceRepository = $SpaceRepository;
    }

    public function get($id){
        $id = $this->decrypt($id);
        return $this->SpaceRepository->show($id);
    }

    public function all(){
        return $this->SpaceRepository->all()->get();
    }

    public function create($request){
        return $this->SpaceRepository->create($request);
    }

    public function update($id,$request){
        $id = $this->decrypt($id);
        return $this->SpaceRepository->update($request,$id);
    }


}