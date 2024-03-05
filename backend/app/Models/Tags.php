<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table='tags';
    /**
     * @var array<int, string>
     */

    protected $fillable = [
        'name'
    ];

    public function posts(){
        return $this->hasMany(Posts::class,'tags_id');
    }
}
