<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    //use HasFactory trait which is a factory for creating model instances
    //explain the use of HasFactory trait
    //A trait is a group of methods that you want to include within another class.
    use HasFactory;
    //Mass assignment in Laravel refers to the ability to assign multiple model attributes in a single statement.
    /*By default, Laravel protects against mass assignment 
    vulnerabilities by only allowing fillable model attributes 
    to be mass assigned.*/
    //mass assignable attributes
   protected $fillable = ['name', 'description', 'completed', 'user_id'];
   //guarded attributes
   //protected $guarded = ['id'];
    //relationships
    //A task belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
