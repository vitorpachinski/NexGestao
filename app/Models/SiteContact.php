<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'contact_reasons_id',
        'message'
    ];
}
