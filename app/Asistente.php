<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
     protected $table = 'Asistente';
     
    /**
     * Event belongs to Contacto.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contacto()
    {
        // belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
        return $this->belongsTo(Contacto::class);
    }

    /**
     * Event belongs to many events.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventos()
    {
        // belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
        return $this->belongsToMany(Evento::class);
    }

}
