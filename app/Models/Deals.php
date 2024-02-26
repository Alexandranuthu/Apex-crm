<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'owner', 'amount','status','start_date', 'close_date'];

    //CASTS: allow you to specify how certain attributes should be converted and represented when interacting with the model
    protected $casts = [
        'status' => 'integer'
    ];
    //defining constants for status
    const PROSPECTING = 1;
    const QUALIFICATION = 2;
    const NEGOTIATION = 3;
    const CLOSED_WON = 4;
    const CLOSED_LOST = 5;

    public function  getStatusLabelAttribute() {
        switch ($this->status) {
                case self::PROSPECTING:
                    return 'Prospecting';
                case self::QUALIFICATION:
                    return 'Qualification';
                case self::NEGOTIATION:
                    return 'Negotiation';
                case self::CLOSED_WON:
                    return 'Closed-won';
                case self::CLOSED_LOST:
                    return  'Closed-lost';
                default:
                    return 'Unknown';
            }
        }
}
