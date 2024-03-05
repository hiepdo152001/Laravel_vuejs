<?php

namespace App\Services;

use App\Models\Social_accounts;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthService
{
    // public function check($email, $social)
    // {
    //     $user = User::with('socical_accounts')->where('email', $email)->first();
    //     // da ton tai
    //     if($user && $user['socical_accounts']['social_provider'] === $social){
    //         return 2;
    //     }
    //     // ton tai tk nhung social khac
    //     if($user && $user['socical_accounts']['social_provider'] !== $social){
    //         return 1;
    //     }
    //     // chua tao user
    //     return 0;

        
    // }
    public function check($email)
    {
        return  User::where('email', $email)->value('email');
        
    }


    public function checkSocial($id){
        return Social_accounts::where('user_id', $id)->first();
    }

    public function create($payload){
        $user = User::create([
            'name'=> $payload->name,
            'email'=> $payload->email,
            'password' => Hash::make('Aa123@#@#@***'),
            'user_name' => isset($payload->username) ? $payload->username : null,
            'status' => 1,
            'role_id'=>1
        ]);
        if($payload->avatar){
            $imageData = file_get_contents($payload->avatar); 
            Storage::disk('s3')->put('avatar/'. $user->id . 'avatar.jpg', $imageData, 'public');
            $user->avatar = 'http://localhost:9000/mybucket/avatar/'. $user->id . 'avatar.jpg';
            $user->save();
        }
        return $user;
    }

    public function upload($payload){

    }

    public function getByEmail($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }


    
}
