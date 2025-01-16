<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'whatsapp_number_1',
        'whatsapp_number_2',
        'phone_number_1',
        'phone_number_2',
    ];
}
