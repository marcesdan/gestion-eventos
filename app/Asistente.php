<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    /**
	 * Event belongs to Contacto.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function contacto() 
	{
		// belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
		return $this->belongsTo(Contacto::class );
	}
}
