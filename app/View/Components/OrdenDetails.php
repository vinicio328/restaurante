<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Orden;
use App\Elemento;
use App\OrdenItem;
use App\Menu;
class OrdenDetails extends Component
{
	public $message;
	public $orden;
	public $item;
	public $esMenu;
	public $menu;
	public $elemento;
	public $elementos;
	public $details;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(Orden $orden, OrdenItem $item, $details = false)
	{
		$this->orden = $orden;
		$this->item = $item;
		$this->details = $details;
		if ($item->item_type == 'menu') {
			$this->esMenu = true;
			$this->menu = Menu::find($item->item_id);
			$this->elementos = $this->menu->items;
		} else {
			$this->esMenu = false;
			$this->elemento = Elemento::find($this->item->item_id);
		}
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render()
	{
		return view('components.orden-details');
	}
}
