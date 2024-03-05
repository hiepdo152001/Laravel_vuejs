<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){

    }
    public function profile()
    {
        $user = $this->getCurrentLoggedIn();
        if (!isset($user)) {
            return response()->json([
                'message' => 'not found login '
            ], 500);
        }
    }
    
    public function ceate(Request $request){
        

    }
    public function update(Request $request){

    }

    public function action(Request $request){

    }
}
