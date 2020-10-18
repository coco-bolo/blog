<?php

namespace App\Models;

use Baum\Node;

class Category extends Node
{
    protected $guarded = [];
    public $timestamps = false;
 
    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
