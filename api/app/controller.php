<?php

namespace App;

use App\Services\ModelService;
use RAR\Framework\Database\Objects\ObjectContext;

class Controller {
	protected $service = null;
	protected $context = null;
	protected $model = null;

	public function __construct () {
		$this -> service = new ModelService();

		$model = explode ("\\", get_class($this));
		$model = str_replace ("Controller", "", $model[count($model) - 1]);
		$model = "App\\Models\\{$model}";

		$this -> model = new $model();
		$this -> context = new ObjectContext($this -> model);
	}
}