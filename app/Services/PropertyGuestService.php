<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\PropertyGuest\PropertyGuestRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;
use App\Http\Resources\PropertyGuestResource;
 
class PropertyGuestService
{
    use ResponseTrait,EncryptionTrait;

    protected $PropertyGuestRepository;


    // CONST PropertyGuest_INVALID_CREDENTIALS = "Invalid credentials";

    public function __construct(PropertyGuestRepository $PropertyGuestRepository){
        $this->PropertyGuestRepository = $PropertyGuestRepository;
    }

    public function get($id){
        $id = $this->decrypt($id);
        return $this->PropertyGuestRepository->show($id);
    }

    public function all(){
        return $this->PropertyGuestRepository->all()->get();
    }

    public function create($request){
        return $this->PropertyGuestRepository->create($request);
    }

    public function update($id,$request){
        $id = $this->decrypt($id);
        return $this->PropertyGuestRepository->update($request,$id);
    }


}