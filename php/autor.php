<?php
include_once 'conectar2.php';

class alunos 
{
    private $Cod_autor;
    private $Nome_autor;
    private $Sobrenome;
    private $email;
    private $nasc;
    private $conn;

    public function getMatricula(){
        return $this-> Cod_autor;
    }
    public function setMatricula($ca){
        $this-> Cod_autor = $ca;
    }
    public function getNome(){
        return $this->Nome_autor;
    }
    public function setNome($name){
        $this-> Nome_autor = $name;
    }
    public function getEndereço(){
        return $this->Sobrenome;
    }
    public function setEndereço($sob){
        $this-> Sobrenome = $sob;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($em){
        $this-> email = $em;
    }
    public function getNasciment(){
        return $this->nasc;
    }
    public function setNasciment($na){
        $this-> nasc = $na;
    }
    function listar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->query("select * from autor order by Cod_autor");
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
        $sql = $this->conn->prepare("insert into `autor` values (?,?,?, ?,?)");
        @$sql -> bindParam(1, $this->getMatricula(), PDO::PARAM_STR);
        @$sql -> bindParam(2, $this->getNome(), PDO::PARAM_STR);
        @$sql -> bindParam(3, $this->getEndereço(), PDO::PARAM_STR);
        @$sql -> bindParam(4, $this->getEmail(), PDO::PARAM_STR);
        @$sql -> bindParam(5, $this->getNasciment(), PDO::PARAM_STR);



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
        $sql = $this->conn->prepare("delete from autor where Cod_autor = ?");
        @$sql -> bindParam(1, $this->getMatricula(), PDO::PARAM_STR);
        
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