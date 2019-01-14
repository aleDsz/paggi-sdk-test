<?php

namespace App\Controllers;

use App\Controller;

class UsersController extends Controller {
	public function authenticate($params) {
		$this -> model -> email = $params["email"];
		$this -> model -> password = $params["password"];

		$result = $this -> model = $this -> service -> findAll ($this -> model);

		if (count ($result) > 0) {
			unset ($result[0] -> password);
			return [
				"status" => true,
				"data" => $result[0]
			];
		} else {
			return [
				"status" => false
			];
		}
	}

	public function getUser($id) {
		$this -> model -> id = $id;
		$result = $this -> model = $this -> service -> find ($this -> model);

		if (!is_null ($result)) {
			return [
				"status" => true,
				"data" => $result
			];
		} else {
			return [
				"status" => false
			];
		}
	}

	public function createUser($params) {
		$this -> model = $this -> context -> fillObject ($params);

		return [
			"status" => $this -> model = $this -> service -> create ($this -> model)
		];
	}

	public function saveUser($id, $params) {
		$this -> model -> id = $id;
		$model = $this -> model;

		$model = $this -> service -> find ($model);

		if (!is_null ($model)) {
			$this -> model = $this -> context -> fillObject ($params);
			return [
				"status" => $this -> model = $this -> service -> save ($this -> model)
			];
		} else {
			return [
				"status" => false
			];
		}
	}

	public function removeUser($id, $params) {
		$this -> model -> id = $id;
		$model = $this -> model;

		$model = $this -> service -> find ($model);

		if (!is_null ($model)) {
			return [
				"status" => $this -> model = $this -> service -> remove ($this -> model)
			];
		} else {
			return [
				"status" => false
			];
		}
	}
}