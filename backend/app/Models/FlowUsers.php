<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowUsers extends Model
{
    use HasFactory;
    protected $table='flow_users';
    /**
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'flow_user_id'
    ];

    public function User(){
        return $this->hasMany(User::class);
    }
}
