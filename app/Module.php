<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function promotions(){
        return $this->belongsToMany(Promotion::class);
    }
}
