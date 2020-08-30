<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'costo'];

    public function elementos()
	{
		return $this->belongsToMany(Elemento::class, 'elemento_menu');
	}

	public function ordens()
    {
        return $this->morphToMany(Orden::class, 'orden_item');
    }
}
