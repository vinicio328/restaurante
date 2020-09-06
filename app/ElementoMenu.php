<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementoMenu extends Model
{
	protected $fillable = ['orden_id', 'parent_id', 'item_id', 'item_type', 'cantidad', 'precio', 'es_custom', 'es_extra'];
	protected $table = 'elemento_menu';	

	public function menu() 
	{
		return $this->belongsTo(Menu::class, 'menu_id');
	}

	public function elemento() 
	{
		return $this->belongsTo(Elemento::class, 'elemento_id', 'id');
	}
}
