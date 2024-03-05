<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    use HasFactory;
    protected $table = 'bookmarks';

    /**
     * @var array<int, string>
    */

    protected $fillable = [
        'user_id',
        'post_id'
    ];
}
