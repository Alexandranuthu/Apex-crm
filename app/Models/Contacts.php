<?php

namespace App\Models;
use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'job_title',
        'organization_id',
        'image'
    ];
    //Add relationships
    public function organization()
    {
        return $this->belongsTo(Organisation::class);
    }
}
