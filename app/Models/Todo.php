<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'title',
        'description',
        'isDone',
        'due_date',
        'created_at',
        'user_id'
    ];
}