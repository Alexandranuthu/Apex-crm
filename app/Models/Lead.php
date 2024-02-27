<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message'
        
    ];
    //relationship between the lead and the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
