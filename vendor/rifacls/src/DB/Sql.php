<?php 

namespace DB;

/**
 * 
 */
class Sql
{
	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "bd_rifa";
	private $conn; 

	function __construct()
	{
		$this->conn = new \PDO("mysql:
			dbname=".Sql::DBNAME.";
			host=".Sql::HOSTNAME,
			Sql::USERNAME,
			Sql::PASSWORD
	);
			}

	public function Select($rawquery)
	{
		$stmt = $this->conn->prepare($rawquery);
		$stmt->execute();
		return $stmt->fetchALL(\PDO::FETCH_ASSOC);
	}
}//fim da classe


 ?>