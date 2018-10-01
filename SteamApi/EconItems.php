<?php
namespace SteamApi;

use SteamApi\Client;
use SteamApi\Containers\Item;
use SteamApi\Interfaces\IEconItems;
use SteamApi\Response\Status;

class EconItems extends Client implements IEconItems {
	protected $interface = 'IEconItems';

	public function __construct($steamApiKey, $steamId, $appId)
	{
		parent::__construct($steamApiKey);
		$this->setSteamId($steamId);
		$this->setAppId($appId);
	}

	public function setAppId($appId) {
		$this->appId = $appId;
		$this->interface = "IEconItems_$appId";
	}

	public function getAppId($appId) {
		return $this->appId;
	}

	public function setSteamId($steamId) {
		$this->steamId = $steamId;
	}

	public function getSteamId() {
		return $this->steamId;
	}

	public function GetPlayerItems() {
		// Set up the api details
		$this->method     = __FUNCTION__;
		$this->version    = 1;

		// Set up the arguments
		$arguments = [
			'steamid' => $this->getSteamId()
		];

		// Get the client
		$client = $this->setUpClient($arguments);

		$result = $client->result;

		$items = [];

		if ($result->status === \SteamApi\Response\Status::PERMISSIONS_DENIED) {
			throw new \SteamApi\Exceptions\PermissionDeniedException();
		} else if ($result->status === \SteamApi\Response\Status::OK) {
			$items = $this->convertToObjects($result->items);
		}

		return $items;
	}

	public function GetSchema($language) {
		$this->method     = __FUNCTION__;
		$this->version    = 1;
	}

	public function GetSchemaURL() {
	}

	public function GetStoreMetaData($language) {
	}

	protected function convertToObjects($apps) {
		$cleanedItems = array();

		foreach ($items as $item) {
			$cleanedItems[] = new Item($item);
		}

		return $cleanedItems;
	}
}
