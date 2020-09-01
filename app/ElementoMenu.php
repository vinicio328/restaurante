<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementoMenu extends Model
{
	protected $fillable = ['cantidad', 'custom'];
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
