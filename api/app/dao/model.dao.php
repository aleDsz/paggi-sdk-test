<?php

namespace App\DAO;

use RAR\Framework\Database\DatabaseFactory;
use RAR\Framework\Database\Data\DataContext;
use RAR\Framework\Database\Command\CommandContext;
use RAR\Framework\Database\Objects\ObjectContext;
use RAR\Framework\Database\SQL\SqlStatementInsert;
use RAR\Framework\Database\SQL\SqlStatementUpdate;
use RAR\Framework\Database\SQL\SqlStatementSelect;
use RAR\Framework\Database\SQL\SqlStatementDelete;

/**
 * Model's Data Access class
 */
class ModelDataAccess
{
	protected $dataContext = null;
	protected $sqlStatement = null;
	protected $objContext = null;
	protected $commandContext = null;

	public function __construct() {
		$this -> dataContext = DatabaseFactory::InstaceOfDataContext();
	}

	public function create($obj) {
		$this -> sqlStatement = new SqlStatementInsert($obj);
		$this -> commandContext = new CommandContext($this -> sqlStatement -> GetSQL ());

		$this -> commandContext -> ExecuteQuery ();
	}

	public function save($obj)
	{	
		$this -> sqlStatement = new SqlStatementUpdate($obj);
		$this -> commandContext = new CommandContext($this -> sqlStatement -> GetSQL ());

		$this -> commandContext -> ExecuteQuery ();
	}

	public function find($obj) {
		$this -> sqlStatement = new SqlStatementSelect($obj);
		$this -> objContext = new ObjectContext($obj);
		$this -> commandContext = new CommandContext($this -> sqlStatement -> GetSQL ());

		return $this -> objContext -> GetObject ($this -> commandContext -> ExecuteReader ());
	}

	public function findAll($obj) {
		$this -> sqlStatement = new SqlStatementSelect($obj);
		$this -> objContext = new ObjectContext($obj);
		$this -> commandContext = new CommandContext($this -> sqlStatement -> GetSQL (true));

		return $this -> objContext -> GetObjects ($this -> commandContext -> ExecuteReader ());
	}

	public function getId($obj) {
		$this -> sqlStatement = new SqlStatementSelect($obj);
		$this -> objContext = new ObjectContext($obj);
		$this -> commandContext = new CommandContext("select max(id) id, * from " . $this -> objContext -> GetTableName ());
		$max = $this -> objContext -> GetObject ($this -> commandContext -> ExecuteReader ());

		return $max -> id + 1;
	}
	

	public function remove($obj) {
		$this -> sqlStatement = new SqlStatementDelete($obj);
		$this -> commandContext = new CommandContext($this -> sqlStatement -> GetSQL ());

		$this -> commandContext -> ExecuteQuery ();
	}
}
