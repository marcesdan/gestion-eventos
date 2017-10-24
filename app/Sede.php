<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
	protected $table = 'Sede';

    public function events()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
		return $this->hasMany(Event::class);
	}

	public function contacto()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
		return $this->belongsTo(Contacto::class);
	}
}
