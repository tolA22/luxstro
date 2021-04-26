<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\PropertyType\PropertyTypeRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;
use App\Http\Resources\PropertyTypeResource;
 
class PropertyTypeService
{
    use ResponseTrait,EncryptionTrait;

    protected $PropertyTypeRepository;


    // CONST PropertyType_INVALID_CREDENTIALS = "Invalid credentials";

    public function __construct(PropertyTypeRepository $PropertyTypeRepository){
        $this->PropertyTypeRepository = $PropertyTypeRepository;
    }

    public function get($id){
        $id = $this->decrypt($id);
        return $this->PropertyTypeRepository->show($id);
    }

    public function all(){
        return $this->PropertyTypeRepository->all()->get();
    }

    public function create($request){
        $request['created_by']= Auth::user()->name;
        return $this->PropertyTypeRepository->create($request);
    }

    public function update($id,$request){
        $id = $this->decrypt($id);
        return $this->PropertyTypeRepository->update($request,$id);
    }


}