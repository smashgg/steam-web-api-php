<?php
namespace SteamApi\Interfaces;

interface IEconItems {
	public function GetPlayerItems();

	public function GetSchema($language);

	public function GetSchemaURL();

	public function GetStoreMetaData($language);
}
