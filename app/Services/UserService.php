<?php 

namespace App\Services;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Exception;
use App\Http\Resources\UserResource;
 
class UserService
{
    use ResponseTrait;

    protected $UserRepository;


    CONST USER_INVALID_CREDENTIALS = "Invalid credentials";

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

    public function register($request){

        $request["role"] = strtolower($request["role"]);
        $password = Hash::make($request["password"]);
        $dob=null;
        if(array_key_exists("dateOfBirth",$request))
            $dob = $request["dateOfBirth"];
        //create user body
        $body = [
            "name"=>$request["name"],
            "password"=>$password,
            "dob"=>$dob,
            "email"=>$request["email"],
            "phone_number"=>$request["phoneNumber"]
        ];

        $user = $this->UserRepository->create($body);
        if($user == null)
            throw new \Exception('Error creating user');

        $user->assignRole($request["role"]);


        // log the user in
        $loginData = [
            "email"=>$request["email"],
            "password"=>$request["password"],
            "role"=>$request["role"]
        ];

        $user = $this->login($loginData);


        // get log in data
        return $user;
        
    }

    public function login($request){
        $myreq = ["email"=>$request['email'],"password"=>$request['password']];
        if(Auth::attempt($myreq)){
		    return $this->getUserToken($request);
            
        }
        throw new \Exception(self::USER_INVALID_CREDENTIALS);
    }



    public function getUserToken($request){
        $params = [
            'username' => Auth::user()->email,
            'password' => $request["password"],
            'grant_type' => 'password',
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'scope' => '',
        ];
        
	
          //established a post request
          $tokenRequest = Request::create(
              url('oauth/token'),
              'POST',
              $params
          );

        //calls the tokenrequest
        $res = app()->handle($tokenRequest);

        $responseBody = json_decode($res->getContent()); // convert to json object

        if($res->status() != 200)
            throw new \Exception($responseBody->message);       
        
        $accessTokenData = ["user"=>new UserResource(Auth::user()),"token"=>$responseBody->access_token];
        return $accessTokenData;
    }

    public function all(){
        return $this->UserRepository->all()->get();
    }

    public function update($request){
        
        return $this->UserRepository->update($request,Auth::id());
    }

}