<?php

namespace App\Models;

use App\Models\Contacts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $table = 'organisation'; 
    protected $fillable = ['name', 'industry', 'orgsize'];
    public function contacts(){
        return $this->hasMany(Contacts::class);
    }
}
