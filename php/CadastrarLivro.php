
<style>
a {
    text-decoration: none;
}

</style>

<form name = "cliente" method="POST" action>
    <fieldset id="a">
        <legend><b>Dados do Produto</b></legend>
        <p>Codigo do livro</p><input type="text" name = "inputcd" size = "50" maxlength="50" placeholder="Digite o id">
        <p>Titulo</p><input type="text" name ="inputtitulo" size = "50" maxlength="50" placeholder="Digite o Nome">
        <p>Categoria</p> <input type="text" name = "inputcategoria" size = "50" maxlength="50" placeholder="Digite a quantidade">
        <p>ISBN</p> <input type="text" name = "inputisbn" size = "50" maxlength="50" placeholder="Digite a quantidade">
        <p>Idioma</p> <input type="text" name = "inputidioma" size = "50" maxlength="50" placeholder="Digite a quantidade">
        <p>QtdePag</p> <input type="text" name = "inputqntdpag" size = "50" maxlength="50" placeholder="Digite a quantidade">


        
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções: </b></legend>
        <br>
        <input type="submit" name = "btnenviar" value="Cadastrar"> &nbsp;&nbsp;
        <input type="reset" name = "limpar" value="limpar"> &nbsp;&nbsp;
        <button><a href="MenuLivro.html">voltar</a></button>
    </fieldset>
</form>

<?php

extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar)) {
    include_once 'livro.php';
    $pro = new livro();
    $pro->setCod_livro($inputcd);
    $pro->setTitulo($inputtitulo);
    $pro->setCategoria($inputcategoria);
    $pro->setISBN($inputisbn);
    $pro->setidioma($inputidioma);
    $pro->setQntdPag($inputqntdpag);



    echo "<he><br><br>" . $pro->salvar() . "</h3>";

}
?>

<br>
<center>



