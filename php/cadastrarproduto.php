<form name = "cliente" method="POST" action>
    <fieldset id="a">
        <legend><b>Dados do Produto</b></legend>
        <p>Id</p><input type="text" name = "inputid" size = "50" maxlength="50" placeholder="Digite o id">
        <p>Nome</p><input type="text" name = "inputnome" size = "50" maxlength="50" placeholder="Digite o Nome">

        <p>Estoque</p> <input type="text" name = "inputestoque" size = "50" maxlength="50" placeholder="Digite a quantidade">
        
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções: </b></legend>
        <br>
        <input type="submit" name = "btnenviar" value="Cadastrar"> &nbsp;&nbsp;
        <input type="reset" name = "limpar" value="limpar"> &nbsp;&nbsp;
        <button><a href="menu.html">voltar</a></button>
    </fieldset>
</form>

<?php

extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar)) {
    include_once 'Produto.php';
    $pro = new Produto();
    $pro->setId($inputid);
    $pro->setNome($inputnome);
    $pro->setEstoque($inputestoque);
    echo "<he><br><br>" . $pro->salvar() . "</h3>";

}
?>

<br>
<center>



