<?php 

namespace DB;

//Classe User
class Cartela extends Sql
{
	private $id_cartela;
	private $id_user;
	private $id_rifa;
	private $id_rifa1;
	private $id_rifa2;
	private $id_rifa3;
	private $nums_rifa1;
	private $nums_rifa2;
	
	//Métodos getters and setters
	public function getId_cartela()
	{
		return $this->id_cartela;
	}
	public function setId_cartela($value)
	{
		$this->id_cartela = $value;
	}
	public function getId_user()
	{
		return $this->id_user;
	}
	public function setId_user($value)
	{
		$this->id_user = $value;
	}
	public function getId_rifa()
	{
		return $this->id_rifa;
	}
	public function setId_rifa($value)
	{
		$this->id_rifa = $value;
	}
	public function getId_rifa1()
	{
		return $this->id_rifa1;
	}
	public function setId_rifa1($value)
	{
		$this->id_rifa1 = $value;
	}
	public function getId_rifa2()
	{
		return $this->id_rifa2;
	}
	public function setId_rifa2($value)
	{
		$this->id_rifa2 = $value;
	}
	public function getId_rifa3()
	{
		return $this->id_rifa3;
	}
	public function setId_rifa3($value)
	{
		$this->id_rifa3 = $value;
	}
	public function getNums_rifa1()
	{
		return $this->nums_rifa1;
	}
	public function setNums_rifa1($value)
	{
		$this->nums_rifa1 = $value;
	}
	public function getNums_rifa2()
	{
		return $this->nums_rifa2;
	}
	public function setNums_rifa2($value)
	{
		$this->nums_rifa2 = $value;
	}
	public function getNums_rifa3()
	{
		return $this->nums_rifa3;
	}
	public function setNums_rifa3($value)
	{
		$this->nums_rifa3 = $value;
	}
	

//Método responsável por inserir valores na tabela tb_user
	public function insert_User()
	{
		//verifica se o email inserido já não existe na tabela
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

//Método responsável por consultar valores pelo email na tabela tb_user
	public function getuserby_Login($email)
	{
		$stmt = $this->conn->prepare("SELECT id_user, nome_user, email_user, date_user FROM bd_rifa.tb_user WHERE email_user = ? LIMIT 1");
		$stmt->bindParam(1,$email,\PDO::PARAM_STR);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		foreach ($results as $result) 
		{
				$res[] = $result;	
		}
		return $res;
	}

//Método responsável por deletar valores na tabela tb_user
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

//Método responsável por alterar valores na tabela tb_user
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

//Método responsável por consultar valores de usuarios logados na tabela tb_user
	public function login_User()
	{
		$stmt = $this->conn->prepare("SELECT senha_user FROM bd_rifa.tb_user WHERE email_user = ?");
		$stmt->bindParam(1,$this->email_user,\PDO::PARAM_STR);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		foreach ($results as  $result) 
		{
			foreach ($result as $valor) 
			{
				$res = $valor;
			}
		}
		return $res;
	}

//Método responsável por consultar valores da rifa que o usuario escolheu na tabela tb_user
	public function getlist_Minharifa($id)
    {
    	$rifa = 1;
        $stmt = $this->conn->prepare("SELECT nome_prod, valor, date_exp FROM bd_rifa.tb_user INNER JOIN bd_rifa.tb_rifa ON tb_user.id_rifa$rifa = tb_rifa.id_rifa WHERE id_user = ?");
        $stmt->bindParam(1,$id,\PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) 
        {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $valor)
            {
                $res[] = $valor;
            }
        }else
        {
            $res = NULL;
        }
        return $res;
    }
  
//"SELECT nome_user, nome_prod FROM bd_rifa.tb_user INNER JOIN bd_rifa.tb_rifa ON tb_user.id_rifa = tb_rifa.id_rifa"

}//fim da classe



 ?>