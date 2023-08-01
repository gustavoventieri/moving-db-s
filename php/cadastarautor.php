<form name = "cliente" method="POST" action>
    <fieldset id="a">
        <legend><b>Dados do Produto</b></legend>
        <p>Codigo do autor</p><input type="text" name = "inputcd" size = "50" maxlength="50" placeholder="Digite o id">
        <p>Nome do auot</p><input type="text" name = "inputnome" size = "50" maxlength="50" placeholder="Digite o Nome">
        <p>Sobrenome</p> <input type="text" name = "inputsobre" size = "50" maxlength="50" placeholder="Digite a quantidade">
        <p>Email</p> <input type="text" name = "inputemail" size = "50" maxlength="50" placeholder="Digite a quantidade">
        <p>Data de nascimento</p> <input type="date" name = "inputdata" size = "50" maxlength="50" placeholder="Digite a quantidade">

        
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções: </b></legend>
        <br>
        <input type="submit" name = "btnenviar" value="Cadastrar"> &nbsp;&nbsp;
        <input type="reset" name = "limpar" value="limpar">
    </fieldset>
</form>

<?php

extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar)) {
    include_once 'autor.php';
    $pro = new alunos();
    $pro->setMatricula($inputcd);
    $pro->setNome($inputnome);
    $pro->setEndereço($inputsobre);
    $pro->setEmail($inputemail);
    $pro->setNasciment($inputdata);

    echo "<he><br><br>" . $pro->salvar() . "</h3>";

}
?>

<br>
<center>
<button><a href="menuautor.html"></a></button>


