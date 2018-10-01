<?php
namespace SteamApi;

use SteamApi\Client;
use SteamApi\Containers\App as AppContainer;
use SteamApi\Interfaces\IEconItems;

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
			'steamId' => $this->getSteamId()
		];
		// Get the client
		$client = $this->setUpClient($arguments);
		print_r($client);
		return $client;
	}

	public function GetSchema($language) {
	}

	public function GetSchemaURL() {
	}

	public function GetStoreMetaData($language) {
	}

	protected function convertToObjects($apps) {
		return $apps;
	}
}
