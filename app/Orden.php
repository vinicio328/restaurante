<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = ['estado', 'nombre', 'nit', 'total'];

    // Agregar mutador 
    // 1= creada;
    // 2= en proceso
    // 3= en entrega
    // 4= completada
    // 5= cancelada
    public function getEstadoAttribute($value)
    {
        if ($value == 1) {
            return "Pendiente";
        }
        else if ($value == 2)
        {
            return "En Proceso";
        }
        else if ($value ==3) 
        {
            return "En Entrega";
        }
        else if ($value == 4) 
        {
            return "Completada";
        }
        else  
        {
            return "Cancelada";
        }
    }

    public function menuItems()
    {
        return $this->hasMany(OrdenItem::class);
    }

    public function menus()
    {
        return $this->morphedByMany(Menu::class, 'order_item');
    }
 
    public function items()
    {
        return $this->morphedByMany(ELemento::class, 'order_item');
    }
}
