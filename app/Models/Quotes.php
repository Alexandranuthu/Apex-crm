<?php

namespace App\Models;

use App\Models\Contacts;
use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;

    // Adding fillable property
    protected $fillable = [
        'deal_id',
        'account_id',
        'contact_id',
        'quote_date',
        'expiry_date',
        'total',
        'status'
    ];
    //adding relationships
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contacts::class);
    }
}
