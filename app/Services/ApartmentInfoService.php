<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\ApartmentInfo\ApartmentInfoRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;
use App\Http\Resources\ApartmentInfoResource;
 
class ApartmentInfoService
{
    use ResponseTrait,EncryptionTrait;

    protected $ApartmentInfoRepository;


    // CONST ApartmentInfo_INVALID_CREDENTIALS = "Invalid credentials";

    public function __construct(ApartmentInfoRepository $ApartmentInfoRepository){
        $this->ApartmentInfoRepository = $ApartmentInfoRepository;
    }

    public function get($id){
        $id = $this->decrypt($id);
        return $this->ApartmentInfoRepository->show($id);
    }

    public function all(){
        return $this->ApartmentInfoRepository->all()->get();
    }

    public function create($request){
        $request["user_id"]  = Auth::id();
        return $this->ApartmentInfoRepository->create($request);
    }

    public function update($id,$request){
        $id = $this->decrypt($id);
        return $this->ApartmentInfoRepository->update($request,$id);
    }


}