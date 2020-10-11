<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'rolename',
        'desc',
    ];

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }
}
