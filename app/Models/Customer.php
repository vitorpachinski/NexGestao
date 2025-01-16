<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Relacionamento com a tabela contacts.
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
