<style>
    body{
        color: white;
        background:   rgb(66, 66, 66);
    }
    a{
     text-decoration: none;
     color: black;   
    }
    .algo{
        font-style: arial;
        font-size: 1.2rem; 
        box-shadow: 5px 100px 100px #00000056;
        margin-left: 40.8rem;
        justify-content: center;
        align-items: center;
        background-color: #585858;
        width: 600px;
        height: 50px;
       
    }
    .nome {
        border-radius: 0.8rem;
        height: 2rem;
        width: 28rem;
        border: none;
    }
    .mexer{
        box-shadow: 5px 100px 100px #00000056;
        border-radius:   10px 10px 0px 0px ;
        margin-top: 4rem;
        margin-left: 40.8rem;
        background-color: #585858;
        width: 600px;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }
    .algo .cont {
        margin-left: 10rem;
        
    }
    .btn {
        
        border-radius: 1.5rem;
        border:none;
        width: 100%;
        height:2rem;
        cursor: pointer;
    }
    .btn2 {
       
        margin-top: 2rem;
        border-radius: 1.5rem;
        border:none;
        width: 8rem;
        height:2rem;
        cursor: pointer;
    }
    .ult {
        
        display: flex;
        border-bottom: 3rem;
        width: 600px;
        height: 90px;
        background-color: #585858;
        margin-left: 40.8rem;
        border-radius:  0px 0px  10px 10px;
       
        justify-content: center;
        align-items: center;

    }
    .desabilitado {
        cursor: not-allowed;
        background: white;
        border-radius: 0.8rem;
        height: 2rem;
        width: 28rem;
        border: none;
    }
    </style>

<?php

  
  include_once "Livro.php";
  $p = new  livro();
  $inputcd = $_POST["inputcl"];
  $p->setCod_livro($inputcd);
  $pro_bd = $p->alterar();

?>
<div class="mexer">
<form name = "cliente2" method = "POST" action="">
    <?php
    foreach($pro_bd as $pro_mostrar) {
    ?>

   <br><br> <input type="hidden" name = "inputcl" size = "5" value =' <?php echo  $pro_mostrar[0]; ?>'> <br>
    <?php echo "Codigo Livro: " . $pro_mostrar[0]; ?><br><br>
    Titulo:  <br>   <input class = "nome" type="text" name = "inputnome" size = "100" value = '<?php echo $pro_mostrar[1]; ?>'><br><br>
    Categoria: <br><input  class = "nome" type="text" name = "inputsobre" size = "100" value = '<?php echo $pro_mostrar[2]; ?>'><br><br>
    ISBN: <br><input  class = "nome" type="text" name = "inputemail" size = "100" value = '<?php echo $pro_mostrar[3]; ?>'><br><br>
    Idioma:<br><input  class = "nome" type="text" name = "data" size = "100" value = '<?php echo $pro_mostrar[4]; ?>'><br><br>
    QntdPag:<br><input  class = "nome" type="text" name = "qntdpag" size = "100" value = '<?php echo $pro_mostrar[5]; ?>'><br><br>

    <input class = "btn" type="submit" name = "btnalterar" value="Alterar"> 
    
    <?php
    }

   
    ?>
</form>
</div>


<?php
  extract($_POST, EXTR_OVERWRITE);
  if(isset($btnalterar)) {
  include_once 'Livro.php';
  $pro = new livro();
  $pro->setTitulo($inputnome);
  $pro->setCategoria($inputsobre);
  $pro->setISBN($inputemail);
  $pro->setidioma($data);
  $pro->setQntdPag($qntdpag);
  $pro->setCod_livro($inputcl);
  echo "<div class = 'algo'> <div class= 'cont'> <br><br> " . $pro->alterar2() . "</div></div>";
  
  

  }
?>

<div class="ult">

<button class = "btn2"><a href="AlteracaoLivro.php">Voltar</a></button>
</div>