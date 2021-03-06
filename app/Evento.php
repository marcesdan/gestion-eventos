<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

    protected $table = 'evento';

    /**
     * Event belongs to Sede.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sede()
    {
        // belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
        return $this->belongsTo(Sede::class);
    }

    /**
     * Event belongs to many asistentes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asistentes()
    {
        // belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
        return $this->belongsToMany(Asistente::class);
    }

}
