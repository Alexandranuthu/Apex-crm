<?php

namespace App\Models;

use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    // Adding fillable property
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'job_title',
        'organisation_id',
        'image'
    ];
    //adding relationships
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}
