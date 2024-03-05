<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Models\Posts;

class PostController 
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Posts::class;
    }
}
