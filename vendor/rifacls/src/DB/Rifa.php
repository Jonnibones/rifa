<?php 

namespace DB;

/**
 * 
 */
class Rifa extends Sql
{
    public $id_rifa;
    public $nome_prod;
    public $num_rifa;
    public $data_atual;
    
    public function getId_rifa()
    {
        return $this->id_rifa;
    }
    public function setId_rifa($value)
    {
        $this->id_rifa = $value;
    }
    public function getNome_prod()
    {
        return $this->nome_prod;
    }
    public function setNome_prod($value)
    {
        $this->nome_prod = $value;
    }
    public function getNum_rifa()
    {
        return $this->num_rifa;
    }
    public function setNum_rifa($value)
    {
        $this->num_rifa = $value;
    }
    public function getData_atual()
    {
        return $this->data_atual;
    }
    public function setData_atual($value)
    {
        $this->data_atual = $value;
    }

    public static function Getlist()
    {
        $results = new Sql();
        return $results->Select("SELECT * FROM bd_rifa.tb_rifa");
            
    }

}//fim da classe


 ?>