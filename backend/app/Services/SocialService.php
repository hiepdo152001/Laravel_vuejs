<?php

namespace App\Services;

use App\Models\Social_accounts;

class SocialService
{
   public function create($SocialUser,$user,$social){
    Social_accounts::create(
        [
            'social_id' => $SocialUser->id,
            'social_name' => $SocialUser->name,
            'social_provider' => $social,
            'user_id' => $user->id
        ],
    );
   }
}