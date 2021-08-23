<?php 

namespace DB;

class User extends Sql
{
	private $id_user;
	private $nome_user;
	private $email_user;
	private $senha_user;
	private $tel_user;
	private $date_user;

	public function getId_user()
	{
		return $this->id_user;
	}
	public function setId_user($value)
	{
		$this->id_user = $value;
	}
	public function getNome_user()
	{
		return $this->nome_user;
	}
	public function setNome_user($value)
	{
		$this->nome_user = $value;
	}
	public function getEmail_user()
	{
		return $this->email_user;
	}
	public function setEmail_user($value)
	{
		$this->email_user = $value;
	}
	public function getSenha_user()
	{
		return $this->senha_user;
	}
	public function setSenha_user($value)
	{
		$this->senha_user = $value;
	}
	public function getTel_user()
	{
		return $this->tel_user;
	}
	public function setTel_user($value)
	{
		$this->tel_user = $value;
	}
	public function getDate_user()
	{
		return $this->date_user;
	}
	public function setDate_user($value)
	{
		$this->date_user = $value;
	}

	public function insert_User()
	{
		$stmt = $this->conn->prepare("SELECT * FROM bd_rifa.tb_user WHERE email_user = ? ");
		$stmt->bindParam(1,$this->email_user,\PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() == 0) 
		{
			$stmt = $this->conn->prepare("INSERT INTO bd_rifa.tb_user(nome_user, email_user, senha_user) VALUES(?,?,?)");
			$stmt->bindParam(1,$this->nome_user, \PDO::PARAM_STR);
			$stmt->bindParam(2,$this->email_user, \PDO::PARAM_STR);
			$stmt->bindParam(3,$this->senha_user, \PDO::PARAM_STR);
			$stmt->execute();
			if ($stmt->rowCount()) 
			{
				$res = "Cadastrado com sucesso!";
			}else
			{
				$res = "Registro não inserido";
			}
		}else
		{
			$res = "Este e-mail já está cadastrado!";
		}	
		return $res;
	}

	public function getlist_User()
	{
		$stmt = $this->conn->prepare("SELECT * FROM bd_rifa.tb_user");
		$stmt->execute();
		return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC));
	}

	public function getnome_Logged($email)
	{
		$stmt = $this->conn->prepare("SELECT nome_user FROM bd_rifa.tb_user WHERE email_user = ? LIMIT 1");
		$stmt->bindParam(1,$email,\PDO::PARAM_STR);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		foreach ($results as $result)
		 {
			foreach ($result as $valor) 
			{
				$res = $valor;			
			}
		}
		return $res;
	}

	public function getuserby_Id($id)
	{
		$stmt = $this->conn->prepare("SELECT * FROM bd_rifa.tb_user WHERE id_user = ? LIMIT 1");
		$stmt->bindParam(1,$id,\PDO::PARAM_INT);
		$stmt->execute();
		return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC));
	}

	public function delete_user($id)
	{
		$stmt = $this->conn->prepare("DELETE FROM bd_rifa.tb_user WHERE id_user = ? LIMIT 1");
		$stmt->bindParam(1,$id,\PDO::PARAM_INT);
		$stmt->execute();
		if ($stmt->rowCount()) 
		{
			$res = "Registro deletado";
		}else
		{
			$res = "Registro não deletado";
		}
		return $res;
	}

	public function update_User($id)
	{
		$stmt = $this->conn->prepare("UPDATE bd_rifa.tb_user SET nome_user = ?, email_user = ?, senha_user = ? WHERE id_user = ? ");
		$stmt->bindParam(1,$this->nome_user, \PDO::PARAM_STR);
		$stmt->bindParam(2,$this->email_user, \PDO::PARAM_STR);
		$stmt->bindParam(3,$this->senha_user, \PDO::PARAM_STR);
		$stmt->bindParam(4,$id,\PDO::PARAM_INT);
		$stmt->execute();
		if ($stmt->rowCount()) 
		{
			$res = "Registro Editado";
		}else
		{
			$res = "Registro não editado";
		}
		return $res;
	}

	public function login_User()
	{

		$stmt = $this->conn->prepare("SELECT senha_user FROM bd_rifa.tb_user WHERE email_user = ?");
		$stmt->bindParam(1,$this->email_user,\PDO::PARAM_STR);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		foreach ($results as  $result) 
		{
			foreach ($result as $valor) {
				$res = $valor;
			}
		}

		return $res;


	}

}//fim da classe



 ?>