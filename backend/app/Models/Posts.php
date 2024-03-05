<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use HasFactory;

    protected $table='posts';
    /**
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'category_id',
        'tags_id',
        'title',
        'description',
        'status',
        'views',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsTo(Tags::class);
    }
    
    public function comments(){
        return $this->hasMany(Comments::class);
    }
}
