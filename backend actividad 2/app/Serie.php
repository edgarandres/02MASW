<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //
    public function platform(){
        return $this->hasOne(Platform::class);
    }

    public function director(){
        return $this->hasOne(Director::class);
    }

    public function actors(){
        return $this->hasMany(Actor::class);
    }

    public function audioLaguage(){
        return $this->hasMany(Audio::class);
    }

    public function subtitleLaguage(){
        return $this->hasMany(Audio::class);
    }
}
