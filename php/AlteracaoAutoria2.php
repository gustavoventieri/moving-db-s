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
        height: 300px;
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

  
  include_once "Autoria.php";
  $p = new autoria();
  $inputcd = $_POST["inputcd"];
  $inputcl = $_POST["inputcl"];
  $p->setCod_autor($inputcd);
  $p->setCod_livro($inputcl);

  
  $pro_bd = $p->alterar();

?>
<div class="mexer">
<form name = "cliente2" method = "POST" action="">
    <?php
    foreach($pro_bd as $pro_mostrar) {
    ?>

   <br><br> <input type="hidden" name = "inputcd" size = "5" value =' <?php echo  $pro_mostrar[0]; ?>'> <br>
    <?php echo "Codigo Autor: " . $pro_mostrar[0]; ?><br>
    <input type="hidden" name = "inputcl" size = "5" value =' <?php echo  $pro_mostrar[1]; ?>'> <br>
    <?php echo "Codigo Autor: " . $pro_mostrar[1]; ?><br><br>
   
    Data de Lancamento <br><input  class = "nome" type="date" name = "data" size = "100" value = '<?php echo $pro_mostrar[2]; ?>'><br><br>
    Editora: <br><input  class = "nome" type="text" name = "inputemail" size = "100" value = '<?php echo $pro_mostrar[3]; ?>'><br><br>
    <input class = "btn" type="submit" name = "btnalterar" value="Alterar"> 
    
    <?php
    }

   
    ?>
</form>
</div>


<?php
  extract($_POST, EXTR_OVERWRITE);
  if(isset($btnalterar)) {
  include_once 'Autor.php';
  $pro = new alunos();
  $pro->setNome($inputnome);
  $pro->setEndereço($inputsobre);
  $pro->setEmail($inputemail);
  $pro->setNasciment($data);
  $pro->setMatricula($inputcd);
  echo "<div class = 'algo'> <div class= 'cont'> <br><br> " . $pro->alterar2() . "</div></div>";
  

  }
?>

<div class="ult">

<button class = "btn2"><a href="MenuAutor.html">Voltar</a></button>
</div>