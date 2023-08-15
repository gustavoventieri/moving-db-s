<?php
include_once 'conectar2.php';

class autoria
{
    private $Cod_autor;
    private $Cod_livro;
    private $Datalancamento;
    private $Editora;

    private $conn;

    public function getCod_autor(){
        return $this-> Cod_autor;
    }
    public function setCod_autor($ca){
        $this-> Cod_autor = $ca;
    }
    public function getCod_livro(){
        return $this-> Cod_livro;
    }
    public function setCod_livro($cl){
        $this-> Cod_livro = $cl;
    }
    public function getDatalancamento(){
        return $this-> Datalancamento;
    }
    public function setDatalancamento($dt){
        $this-> Datalancamento = $dt;
    }
    public function getEditora(){
        return $this-> Editora;
    }
    public function setEditora($ed){
        $this-> Editora = $ed;
    }





    function listar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->query("select * from autoria order by Cod_autor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;   
        }
        catch(PDOException $exc){
            echo 'Erro ao consultar a consulta'. $exc->getMessage();
        }
    }

    function salvar() {
        try{
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("insert into `autoria` values (?,?,?, ?)");
        @$sql -> bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        @$sql -> bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);
        @$sql -> bindParam(3, $this->getDatalancamento(), PDO::PARAM_STR);
        @$sql -> bindParam(4, $this->getEditora(), PDO::PARAM_STR);
      



        if($sql->execute() == 1) {
            return "registro foi feito com sucesso";
        }
        $this -> conn = null;
    }catch(PDOException $exc)
    {
        echo "Erro ao salvar o registro";
    }
}



function exclusao() {
    try {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("delete from `autoria` where Cod_livro = ? and Cod_autor = ?");
        @$sql -> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
        @$sql -> bindParam(2, $this->getCod_autor(), PDO::PARAM_STR);

        
    if($sql->execute() == 1) {
        return "Exclusão realizada com sucesso";
    } else {
        echo "Erro ao excluir";
    }
    $this -> conn = null;
}catch(PDOException $exc)
{
    echo "Erro ao excluir" . $exc->getMessage();
}

    }
}


?>