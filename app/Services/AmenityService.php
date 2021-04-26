<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\Amenity\AmenityRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;
use App\Http\Resources\AmenityResource;
 
class AmenityService
{
    use ResponseTrait,EncryptionTrait;

    protected $AmenityRepository;


    // CONST Amenity_INVALID_CREDENTIALS = "Invalid credentials";

    public function __construct(AmenityRepository $AmenityRepository){
        $this->AmenityRepository = $AmenityRepository;
    }

    public function get($id){
        $id = $this->decrypt($id);
        return $this->AmenityRepository->show($id);
    }

    public function all(){
        return $this->AmenityRepository->all()->get();
    }

    public function create($request){
        return $this->AmenityRepository->create($request);
    }

    public function update($id,$request){
        $id = $this->decrypt($id);
        return $this->AmenityRepository->update($request,$id);
    }


}