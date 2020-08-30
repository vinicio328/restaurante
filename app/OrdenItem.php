<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenItem extends Model
{
	protected $fillable = ['cantidad', 'es_extra'];
    protected $table = 'orden_item';
}
