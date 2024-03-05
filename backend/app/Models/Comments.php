<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table='comments';

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'content'
    ];

    public function posts(){
        return $this->belongsTo(Posts::class);
    }
}
