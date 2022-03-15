<?php


// AÑADIR SOFT DELETED https://www.youtube.com/watch?v=Cn5fUt7l4mk&list=PLU8oAlHdN5Bk-qkvjER90g2c_jVmpAHBh&index=25
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Serie extends Model

{
    use SoftDeletes;
    //
    public function platform(){
        return $this->belongsTo(Platform::class)->withTrashed();
    }

    public function director(){
        return $this->belongsTo(Director::class)->withTrashed();
    }

    public function actors(){
        return $this->belongsToMany(Actor::class)->withTrashed();
    }

    public function audioLanguages(){
        return $this->belongsToMany(Language::class,'language_serie_audio')->withTrashed();
    }

    public function subtitleLanguages(){
        return $this->belongsToMany(Language::class,'language_serie_subtitle')->withTrashed();
    }

    public function detachAllActors(){
        $this->actors()->detach();
    }

    
    public function detachAllAudioLanguages(){
        $this->audioLanguages()->detach();
    }

    
    public function detachAllSubtitleLanguages(){
        $this->subtitleLanguages()->detach();
    }
}
