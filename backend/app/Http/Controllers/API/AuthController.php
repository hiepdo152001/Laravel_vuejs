<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Services\SocialService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    protected $authService;
    /**
     * @var SocialService
     */
    protected $socialService;
    public function __construct(
        AuthService $authService,
        SocialService $socialService
        ){
        $this->authService = $authService;
        $this->socialService = $socialService;
    }

    public function LoginUrl($social){
        return Socialite::driver($social)->redirect();
    }

    // public function CallBack($social) {
    //     $SocialUser = Socialite::driver($social)->user();
    //     $check = $this->authService->check($SocialUser->email, $social);
    //     switch ($check) {
    //         case 0:
    //         case 1:
    //             $user = ($check == 0) ? $this->authService->create($SocialUser) : $this->authService->getByEmail($SocialUser->email);
    //             $this->socialService->create($SocialUser, $user, $social);
    //             $token = $user->createToken('api_token')->plainTextToken;
    //             $cookies = cookie::make('api_token', $token, 60*24);
    //             return redirect('http://localhost:5173/')->withCookie($cookies);
    //         default:
    //             $user = $this->authService->getByEmail($SocialUser->email);
    //             $token = $user->createToken('api_token')->plainTextToken;
    //             $cookies = cookie::make('api_token', $token, 60*24);
    //             return redirect('http://localhost:5173/')->withCookie($cookies);
    //     }
    // }
    public function CallBack($social)
    {
        try {
            $googleUser = Socialite::driver($social)->user();
            $check = $this->authService->check($googleUser->email);
            $user=$this->authService->getByEmail($googleUser->getEmail());
            if (!$check) {
                $user=$this->authService->create($googleUser);
                $this->socialService->create($googleUser, $user, $social);
            }
            if($user-> status === 0){
                return  redirect('http://localhost:5173/login');
            }
            if (Auth::attempt(['email'=> $googleUser->email, 'password'=>'Aa123@#@#@***'])) {
                $user->tokens()->delete();
                $token=$user->createToken('authToken')->plainTextToken;
                $cookies= cookie::make('api_token',$token,60*24);
                return redirect('http://localhost:5173/')->withCookie($cookies);
            }
            return redirect()->back();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function register(RegisterRequest $request){
        $user = $this->authService->create($request);
        return response()->json([
            $user
        ],200);
    }

    public function Login(Request $request){
        Log::info('login');
        $user = $this->authService->getByEmail($request->email);
        if (!$user) {
            Log::info('email not found!');
            return response()->json([
                'message' => 'Tài khoản hoặc mật khẩu không chính xác!',
                'status' => false
            ], 401);
        }
        if ($user->status === 0) {
            Log::info('account not active');
            return response()->json([
                'message' => 'Tài khoản đã bị đóng băng!',
            ], 500);
        }
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Tài khoản hoặc mật khẩu không chính xác!',
                'status' => false
            ], 401);
        }
        session()->regenerate();
        $user->tokens()->delete();
        $token = $user->createToken('api_token')->plainTextToken;
        $cookies= cookie::make('api_token', $token, 60*24);
        return response()->json([
            'message' => 'Đăng nhập thành công!',
        ], 200)->withCookie($cookies);
    }

    public function logout(){
        $user = $this->GetCurrentLoggedIn();
        $user->tokens()->delete();
        $cookie = cookie()->forget('api_token');
        return redirect('http://localhost:5173/login')->withCookie($cookie);
    }

}
