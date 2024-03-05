<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social_accounts extends Model
{
    use HasFactory;
    protected $table = 'social_accounts';
    protected $fillable = [
        'user_id',
        'social_id',
        'social_provider',
        'social_name',
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
