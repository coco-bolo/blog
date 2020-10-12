<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'name',
        'pass',
        'tel',
        'email',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
