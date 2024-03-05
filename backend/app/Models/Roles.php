<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table='roles';
    /**
     * @var array<int, string>
     */

    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany(User::class,'role_id');
    }
}
