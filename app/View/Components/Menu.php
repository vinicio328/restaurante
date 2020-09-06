<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Orden;
use App\Elemento;
use App\OrdenItem;
use App\Menu;

class MenuDetails extends Component
{
    public $message;
    public $orden;
    public $item;
    public $esMenu;
    public $menu;
    public $elemento;
    public $elementos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(rden $orden, OrdenItem $item, $message = '')
    {        
        $this->message = "TEst";
        $this->orden = $orden;
        $this->item = $item;
        $this->menu = $item;

        if ($this->item->item_type == 'menu') {
            $this->esMenu = true;
            $this->menu == Menu::find($this->item->item_id);
        } else {
            $this->esMenu = false;
            $this->elemento == Elemento::find($this->item->item_id);
        }
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu', ['menu' => $this->menu]);
    }
}
