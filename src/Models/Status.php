<?php

namespace StatusActivityLog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'module', 
        'name', 
        'code', 
        'description', 
        'color',
        'is_active', 
        'is_default', 
        'created_by', 
        'updated_by'
    ];
}
