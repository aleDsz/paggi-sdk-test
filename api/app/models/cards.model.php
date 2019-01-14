<?php

namespace App\Models;

/**
 * @table cards
 */
class Cards {
	/**
	 * @field id
	 * @type integer
	 * @pk True
	 * @size 11
	 */
	public $id;

	/**
	 * @field user_id
	 * @type integer
	 * @pk False
	 * @size 11
	 */
	public $user_id;

	/**
	 * @field number
	 * @type varchar
	 * @pk False
	 * @size 16
	 */
	public $number;

	/**
	 * @field holder_name
	 * @type varchar
	 * @pk False
	 * @size 120
	 */
	public $holder_name;

	/**
	 * @field cvv
	 * @type varchar
	 * @pk False
	 * @size 4
	 */
	public $cvv;

	/**
	 * @field created_at
	 * @type datetime
	 * @pk False
	 * @size 11
	 */
	public $created_at;

	/**
	 * @field updated_at
	 * @type datetime
	 * @pk False
	 * @size 11
	 */
	public $updated_at;
}