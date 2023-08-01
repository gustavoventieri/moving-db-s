<form name = "cliente" method="POST" action>
    <fieldset id="a">
        <legend><b>Dados do Produto</b></legend>
        <p>Codigo do autor</p><input type="text" name = "inputcd" size = "50" maxlength="50" placeholder="Digite o id">
        <p>Codigo livro</p><input type="text" name = "inputcl" size = "50" maxlength="50" placeholder="Digite o Nome">
        <p>Editora</p> <input type="text" name = "inputedi" size = "50" maxlength="50" placeholder="Digite a quantidade">
        <p>Data de lançamento</p> <input type="date" name = "inputdata" size = "50" maxlength="50" placeholder="Digite a quantidade">

        
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções: </b></legend>
        <br>
        <input type="submit" name = "btnenviar" value="Cadastrar"> &nbsp;&nbsp;
        <input type="reset" name = "limpar" value="limpar"> &nbsp;&nbsp;
        <button><a href="menuautor.html">voltar</a></button>
    </fieldset>
</form>

<?php

extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar)) {
    include_once 'autoria.php';
    $pro = new autoria();
    $pro->setCod_autor($inputcd);
    $pro->setCod_livro($inputcl);
    $pro->setDatalancamento($inputdata);
    $pro->setEditora($inputedi);

    echo "<he><br><br>" . $pro->salvar() . "</h3>";

}
?>

<br>
<center>



