<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenItem extends Model
{
	protected $fillable = ['cantidad', 'es_extra'];
    protected $table = 'orden_item';

    public function orden() 
    {
        return $this->belongsTo(Orden::class, 'orden_id');
    }
    
    public function children()
    {
        return $this->hasMany(OrdenItem::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(OrdenItem::class, 'parent_id');
    }

    public function getElementoAttribute()
    {
        $elemento = Elemento::find($this->item_id);
        return $elemento;
        
    }
}
