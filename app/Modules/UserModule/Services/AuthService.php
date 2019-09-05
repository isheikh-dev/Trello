<?php 

namespace UserModule\Services;

use UserModule\Http\Resources\AuthLoginResource;
use UserModule\Repositories\AuthRepositoryInterface; 
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client;
 
use function GuzzleHttp\json_decode;

class AuthService
 {
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }  

    public function register($request) 
    {  
        $user = $this->authRepository->create($request);
        $access_token = $user->createToken('access_token')->accessToken; 
        return $this->registerResponse($access_token);
        
    }
    public function registerResponse($access_token) 
    {
        return response()->json([
                    'data' => [
                        'access_token' => $access_token
                    ],
                    'status' => 'Success', 
                    'statusCode' => 201
                ]);
    }
    public function login($data)
    {  
        $client = new Client();   
        try{ 
            $response = $this->oauthLoginRequest($client, $data);  
            return new AuthLoginResource(json_decode($response)); 
         } catch(BadResponseException $e ){ 
            $this->handleBadResponseException($e); 
        }
     }

    public function oauthFormParams($data)
    {
        return  [
            'grant_type' => 'password',
            'client_id'  => 2,
            'client_secret' => '5moDs25iPQTTElC4eHP6PQ3KzRvvuf4TSNqqdf8j',
            'username' => $data->username,
            'password' => $data->password
        ];  
    }
    public function oauthLoginRequest($client, $data)
    { 
        // Be Sure to serve different port with terminal
        $response =  $client->post('http://127.0.0.1:81/oauth/token', [
            'form_params' => $this->oauthFormParams($data)
        ]);  
        return $response->getBody();  
    } 
    public function handleBadResponseException($e)
    {
        if($e->getCode() == 400) { 
            $this->response_400($e); 
        } else if ($e->getCode() == 401) { 
            $this->response_401($e);
        }  
        return response()->json('Something Went wrong with the serveer', $e->getCode());
    }
    public function response_400($e)
    {
        return response()->json(
                            'Bad Request - Invalid URL',
                            $e->getCode()
                            );
    }
    public function response_401($e)
    {
        return response()->json(
                            'invalid Request, Please enter a username or a password',
                            $e->getCode()
                            );
    } 
    public function logout(){
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json([
            'message' => 'Logged Out Successfuly',
            'status'  => 'success', 
            'statusCode' => 200
        ]);
    }
    
  
 
}