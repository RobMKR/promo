<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoUser extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'passport',
        'creator_id'
    ];

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
