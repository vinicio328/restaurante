<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
	protected $fillable = ['nombre', 'descripcion', 'sin_costo', 'imagen', 'costo'];

	public function menus()
	{
		return $this->belongsToMany(Menu::class, 'elemento_menu');
	}

	public function ordens()
    {
        return $this->morphToMany(Orden::class, 'orden_item');
    }
}
