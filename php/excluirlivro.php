<form name = "cliente" method="POST" action>
    <fieldset id="a">
        <legend><b>Dados do Produto</b></legend>
        <p>Codigo do Livro</p><input type="text" name = "inputcl" size = "50" maxlength="50" placeholder="Digite o id">
       


        
        
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções: </b></legend>
        <br>
        <input type="submit" name = "btnenviar" value="Cadastrar"> &nbsp;&nbsp;
        <input type="reset" name = "limpar" value="limpar"> &nbsp;&nbsp;
        <button><a href="menulivro.html">voltar</a></button>
    </fieldset>
</form>

<?php

extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar)) {
    include_once 'livro.php';
    $pro = new livro();
    $pro->setCod_livro($inputcl);
   
    echo "<he><br><br>" . $pro->exclusao() . "</h3>";

}
?>