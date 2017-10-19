<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    public function events()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = category_id, localKey = id)
		return $this->hasMany(Event::class);
	}
}