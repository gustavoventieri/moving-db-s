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
        height: 150px;
       
    }
    .nome {
        border-radius: 0.8rem;
        height: 2rem;
        width: 100%;
        border: none;
    }
    .mexer{
        box-shadow: 5px 100px 100px #00000056;
        border-radius:   10px 10px 0px 0px ;
        margin-top: 4rem;
        margin-left: 40.8rem;
        background-color: #585858;
        width: 600px;
        height: 250px;
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
    
</style>

<div class="mexer">

<form name = "cliente" method="POST" action>
  
       <h3>Consultar livro</h3> 
       <input class = "nome" type="text" name = "inputnome" size = "50" maxlength="50"  required placeholder="Digite o Nome do LIvro">
</br>
   
   
      
</br>
</br>

        <input class = "btn"type="submit" name = "btnenviar" value="Consultar"> </br>  </br>
        <input class = "btn" type="reset" name = "limpar" value="Limpar"> </br> </br>
        
</form>
</div>

<?php

extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar)) {
    include_once 'livro.php';
    $p = new livro();
    $p->setTitulo($inputnome. '%');
    $pro_bd = $p->consultar();
    if(is_array($pro_bd)) {
    foreach($pro_bd as $pro_mostrar)
    {
        ?>
     <?php  echo "<div class= 'algo'> <div class= 'cont'>
                <b>Codigo Livro: </b>  $pro_mostrar[0] </br>
                <b>Titulo:</b>  $pro_mostrar[1] </br>
                <b>CAtegoria: </b> $pro_mostrar[2] </br>
                <b>ISBN:</b> $pro_mostrar[3] </br>
                <b>Idioma:</b>  $pro_mostrar[4] </br>
                <b>Quantidade de paginas:</b>  $pro_mostrar[5]
                </br></br>
   
                </div></div>"; ?> 
       
        <?php

    }

}
}

?>

<div class="ult">
<button class = "btn2"><a href="MenuLivro.html">Voltar</a></button>
</div>







