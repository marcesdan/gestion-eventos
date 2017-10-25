<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{

    protected $table = 'sede';
    public $timestamps = false;

    public function eventos()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
        return $this->hasMany(Evento::class);
    }

}
