<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{

    protected $table = 'asistente';

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
