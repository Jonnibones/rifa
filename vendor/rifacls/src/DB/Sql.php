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

	// Método construtor para iniciar a conexão
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