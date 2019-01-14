<?php

namespace App\Factories;

use App\DAO\ModelDataAccess;

/**
 * Model's Factory class
 */
class ModelFactory
{
	private static $dao = null;

	public static function getDataAccessInstance()
	{
		if (self::$dao == null)
			self::$dao = new ModelDataAccess();
		return self::$dao;
	}
}
