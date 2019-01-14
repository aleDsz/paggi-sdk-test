<?php

namespace App\Services;

use App\Factories\ModelFactory;

/**
 * Model's Service class
 */
class ModelService
{
	public static function create($obj)
	{
		$dao = ModelFactory::getDataAccessInstance();

		$obj -> id = $dao -> getId ($obj);
		$obj -> created_at = date ("Y-m-d H:i:s");
		$obj -> updated_at = null;

		$dao -> create ($obj);
		return true;
	}

	public static function save($obj)
	{
		$dao = ModelFactory::getDataAccessInstance();
		$obj -> updated_at = date ("Y-m-d H:i:s");

		$dao -> save ($obj);
		return true;
	}

	public static function find($obj)
	{
		$dao = ModelFactory::getDataAccessInstance();
		return $dao -> find ($obj);
	}

	public static function findAll($obj)
	{
		$dao = ModelFactory::getDataAccessInstance();
		return $dao -> findAll ($obj);
	}

	public static function remove($obj)
	{
		$dao = ModelFactory::getDataAccessInstance();
		$dao -> remove ($obj);
		return true;
	}
}
