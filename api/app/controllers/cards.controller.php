<?php

namespace App\Controllers;

use App\Controller;

class CardsController extends Controller {
	public function getCards($params) {
		if (!isset ($params["user_id"])) {
			return [
				"status" => false
			];
		}

		$this -> model = $this -> context -> fillObject ($params);
		$result = $this -> model = $this -> service -> findAll ($this -> model);

		if (count ($result) > 0) {
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

	public function getCard($id) {
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

	public function createCard($params) {
		// Check existing user
		$model = new \App\Models\Users();
		if (isset ($params["user_id"])) {
			$model -> id = $params["user_id"];
		} else if (isset ($params["user"])) {
			$model -> id = $params["user"]["id"];
		} else {
			return [
				"status" => false
			];
		}

		$model = $this -> service -> find ($model);

		if (is_null ($model)) {
			return [
				"status" => false
			];
		}

		$this -> model = $this -> context -> fillObject ($params);
		return [
			"status" => $this -> model = $this -> service -> create ($this -> model)
		];
	}

	public function saveCard($id, $params) {
		$model = new \App\Models\Cards();
		$model -> id = $id;
		$model = $this -> service -> find ($model);

		if (!is_null ($model)) {
			$this -> model = $this -> context -> fillObject ($params);
			$this -> model -> created_at = $model -> created_at;

			return [
				"status" => $this -> model = $this -> service -> save ($this -> model)
			];
		} else {
			return [
				"status" => false
			];
		}
	}

	public function removeCard($id) {
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