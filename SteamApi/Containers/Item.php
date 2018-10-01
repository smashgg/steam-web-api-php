<?php
namespace SteamApi\Containers;

class Item {
	public $id;
	public $originalId;
	public $defindex;
	public $level;
	public $quality;
	public $inventory;
	public $quantity;
	public $untradeable = false;
	public $attributes;
	public $equipped;

	public function __construct($item)
	{
		$this->id          = $item->id;
		$this->originalId  = $item->original_id;
		$this->defindex    = $item->defindex;
		$this->level       = $item->level;
		$this->quality     = $item->quality;
		$this->inventory   = $item->inventory;
		$this->quantity    = $item->quantity;
		$this->untradeable = isset($item->flag_cannot_trade) ? $item->flag_cannot_trade : false;
		$this->attributes  = isset($item->attributes) ? $item->attributes : null;
		$this->equipped    = isset($item->equipped) ? $item->equipped : null;
	}
}
