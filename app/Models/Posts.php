<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
    // adding a relationship to users 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
