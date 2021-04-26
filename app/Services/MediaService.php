<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use App\Traits\EncryptionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\Media\MediaRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;
use App\Http\Resources\MediaResource;
 
class MediaService
{
    use ResponseTrait,EncryptionTrait;

    protected $MediaRepository;


    // CONST Media_INVALID_CREDENTIALS = "Invalid credentials";

    public function __construct(MediaRepository $MediaRepository){
        $this->MediaRepository = $MediaRepository;
    }

    public function get($id){
        $id = $this->decrypt($id);
        return $this->MediaRepository->show($id);
    }

    public function all(){
        return $this->MediaRepository->all()->get();
    }

    public function create($request){
        return $this->MediaRepository->create($request);
    }

    public function update($id,$request){
        $id = $this->decrypt($id);
        return $this->MediaRepository->update($request,$id);
    }


}