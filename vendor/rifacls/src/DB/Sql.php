<?php 

namespace DB;

/**
 * Classe para conexão com o banco de dados
 */
class Sql
{
	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "bd_rifa";
	protected $conn; 

	function __construct()
	{
		$this->conn = new \PDO("mysql:
			dbname=".Sql::DBNAME.";
			host=".Sql::HOSTNAME,
			Sql::USERNAME,
			Sql::PASSWORD
		);
	}

}//fim da classe


 ?>