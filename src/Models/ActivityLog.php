<?php

namespace StatusActivityLog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'user_name', 
        'action', 
        'model', 
        'model_id', 
        'ip_address', 
        'changes'
    ];

    protected $casts = [
        'changes' => 'array',
    ];
}
