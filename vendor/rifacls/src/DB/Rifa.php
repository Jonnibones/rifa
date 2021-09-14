<?php 

namespace DB;

//Classe Rifa
class Rifa extends Sql
{
    private $id_rifa;
    private $nome_prod;
    private $descr_prod;
    private $qtd_num;
    private $status;
    private $valor;
    private $imagem;
    private $date_exp;
    private $date_rifa;

//Métodos getters and setters
    public function getid_Rifa()
    {
        return $this->id_rifa;
    }
    public function setid_Rifa($value)
    {
        $this->id_rifa = $value;
    }
      public function getnome_Prod()
    {
        return $this->nome_prod;
    }
    public function setnome_Prod($value)
    {
        $this->nome_prod = $value;
    }
      public function getdescr_Prod()
    {
        return $this->descr_prod;
    }
    public function setdescr_Prod($value)
    {
        $this->descr_prod = $value;
    }
      public function getqtd_Num()
    {
        return $this->qtd_num;
    }
    public function setqtd_Num($value)
    {
        $this->qtd_num = $value;
    }
      public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($value)
    {
        $this->status = $value;
    }
    public function getImagem()
    {
        return $this->imagem;
    }
    public function setImagem($value)
    {
        $this->imagem = $value;
    }
      public function getValor()
    {
        return $this->valor;
    }
    public function setValor($value)
    {
        $this->valor = $value;
    }
      public function getdate_Exp()
    {
        return $this->date_exp;
    }
    public function setdate_Exp($value)
    {
        $this->date_exp = $value;
    }
     public function getdate_Rifa()
    {
        return $this->date_rifa;
    }
    public function setdate_Rifa($value)
    {
        $this->date_rifa = $value;
    }

//Método responsável por inserir valores na tabela tb_rifa
    public function insert_Rifa()
    {
        $stmt = $this->conn->prepare("INSERT INTO bd_rifa.tb_rifa(nome_prod, descr_prod, qtd_num, valor, img_rifa, date_exp) VALUES(?,?,?,?,?,?)");
        $stmt->bindParam(1,$this->nome_prod, \PDO::PARAM_STR);
        $stmt->bindParam(2,$this->descr_prod, \PDO::PARAM_STR);
        $stmt->bindParam(3,$this->qtd_num, \PDO::PARAM_INT);
        $stmt->bindParam(4,$this->valor, \PDO::PARAM_STR);
        $stmt->bindParam(5,$this->imagem, \PDO::PARAM_LOB);
        $stmt->bindParam(6,$this->date_exp, \PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount()) 
        {
            $res = "Rifa Cadastrada com sucesso!";
        }else
        {
            $res = "Rifa não inserido";
        }
        return $res;
    }


//Método responsável por consultar valores na tabela tb_rifa
    public function getlist_Rifa()
    {
        $stmt = $this->conn->prepare("SELECT id_rifa, nome_prod, descr_prod, img_rifa, qtd_num, date_exp FROM bd_rifa.tb_rifa LIMIT 2 ");
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

//Método responsável por consultar valores pelo id na tabela tb_rifa
    public function getrifaby_Id($id)
    {
        $stmt = $this->conn->prepare("SELECT nome_prod, descr_prod, date_exp FROM bd_rifa.tb_rifa WHERE id_rifa = ? LIMIT 1 ");
        $stmt->bindParam(1,$id,\PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) 
        {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $value)
            {
                foreach ($value as $valor) 
                {
                    $res[] = $valor;
                }
            }
        }else
        {
            $res = "Nenhuma rifa disponível.";
        }
        return $res;
    }

//Método responsável por deletar valores pelo id na tabela tb_rifa
    public function delete_rifa($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM bd_rifa.tb_rifa WHERE id_rifa = ? LIMIT 1");
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

//Método responsável por atualizar valores na tabela tb_rifa
    public function update_Rifa($id)
    {
        $stmt = $this->conn->prepare("UPDATE bd_rifa.tb_rifa SET nome_prod = ?, descr_prod = ?, qtd_num = ?, valor = ?, date_exp = ? WHERE id_rifa = ? ");
        $stmt->bindParam(1,$this->nome_prod, \PDO::PARAM_STR);
        $stmt->bindParam(2,$this->descr_prod, \PDO::PARAM_STR);
        $stmt->bindParam(3,$this->qtd_num, \PDO::PARAM_INT);
        $stmt->bindParam(4,$this->valor, \PDO::PARAM_STR);
        $stmt->bindParam(5,$this->date_exp, \PDO::PARAM_STR);
        $stmt->bindParam(6,$id,\PDO::PARAM_INT);
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

  
//"SELECT nome_user, nome_prod FROM bd_rifa.tb_user INNER JOIN bd_rifa.tb_rifa ON tb_user.id_rifa = tb_rifa.id_rifa"

}//fim da classe



 ?>