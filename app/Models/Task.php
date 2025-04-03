<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use SoftDeletes;

    // Add 'title', 'description', and 'completed' to the fillable array
    protected $fillable = [
        'title',      // Add title for mass assignment
        'description', // Add description for mass assignment
        'completed',   // Add completed for mass assignment
    ];

    protected $casts = [
        'completed' => 'boolean', // This will ensure 'completed' is cast to a boolean
    ];
}
