<?php
include_once 'conectar2.php';

class livro
{
    private $cod_livro;
    private $Titulo;
    private $Categoria;
    private $ISBN;
    private $Idioma;
    private $QntdPag;
    private $conn;

    public function getCod_livro(){
        return $this-> cod_livro;
    }
    public function setCod_livro($cl){
        $this-> cod_livro = $cl;
    }
    public function getTitulo(){
        return $this-> Titulo;
    }
    public function setTitulo($ti){
        $this-> Titulo = $ti;
    }
    public function getCategoria(){
        return $this-> Categoria;
    }
    public function setCategoria($ca){
        $this-> Categoria = $ca;
    }
    public function getISBN(){
        return $this-> ISBN;
    }
    public function setISBN($isb){
        $this-> ISBN = $isb;
    }
    public function setidioma($idi){
        $this-> Idioma = $idi;
    }
    public function getIdioma(){
        return $this-> Idioma;
    }
    public function getQntdPag(){
        return $this-> QntdPag;
    }
    public function setQntdPag($qntd){
        $this-> QntdPag = $qntd;
    }


    function listar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->query("select * from livro order by Cod_livro");
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
        $sql = $this->conn->prepare("insert into `livro` values (?,?,?,?,?,?)");
        @$sql -> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
        @$sql -> bindParam(2, $this->getTitulo(), PDO::PARAM_STR);
        @$sql -> bindParam(3, $this->getCategoria(), PDO::PARAM_STR);
        @$sql -> bindParam(4, $this->getISBN(), PDO::PARAM_STR);
        @$sql -> bindParam(5, $this->getIdioma(), PDO::PARAM_STR);
        @$sql -> bindParam(6, $this->getQntdPag(), PDO::PARAM_STR);

      



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
        $sql = $this->conn->prepare("delete from `livro` where Cod_livro = ?");
        @$sql -> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
        
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