<?php
namespace SteamApi\Exceptions;

class PermissionDeniedException extends \Exception {
	public function __construct()
	{
		parent::__construct(sprintf('Permissions Denied'));
	}
}
