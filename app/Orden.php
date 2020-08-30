<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
     
    public function menus()
    {
        return $this->morphedByMany(Menu::class, 'order_item');
    }
 
    public function items()
    {
        return $this->morphedByMany(ELemento::class, 'order_item');
    }
}
