<?php

namespace App\Models;

/**
 * @table users
 */
class Users {
	/**
	 * @field id
	 * @type integer
	 * @pk True
	 * @size 11
	 */
	public $id;

	/**
	 * @field name
	 * @type varchar
	 * @pk False
	 * @size 140
	 */
	public $name;

	/**
	 * @field email
	 * @type varchar
	 * @pk False
	 * @size 120
	 */
	public $email;

	/**
	 * @field password
	 * @type varchar
	 * @pk False
	 * @size 35
	 */
	public $password;

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