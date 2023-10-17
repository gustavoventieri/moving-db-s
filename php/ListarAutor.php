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
      
        margin-left: 40.8rem;
        justify-content: center;
        align-items: center;
  
      
        border-radius: 2rem;
       
    }
    .nome {
        border-radius: 0.8rem;
        height: 2rem;
        width: 28rem;
        border: none;
    }
    
    .algo .cont {
        
        
    }
    .algod {
        margin-left: -5rem;
        margin-top: 6rem;
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
    .lista {
        gap: 10px;
    }
    button {
        border-radius: 1.5rem;
        border:none;
        width: 34rem;
        height:2rem;
        cursor: pointer;
    }
    </style>


<div class="algo">
    <div class="algod">
<?php

include_once 'autor.php';
$p = new alunos();
$pro_bd = $p->listar();

?>
<br>
<b> Cod_autor &nbsp;&nbsp; &nbsp; &nbsp;  Nome &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Sobrenome &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Email &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;   &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; Nasc </b>
<?php
if(is_array($pro_bd)) {
foreach($pro_bd as $pro_mostrar)
{
    ?>
    <br><br>
    
       <b> <?php echo $pro_mostrar[0]; ?></b>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
        <?php echo $pro_mostrar[1]; ?>   &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
        <?php echo $pro_mostrar[2]; ?>      &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
        <?php echo $pro_mostrar[3]; ?>   &nbsp;&nbsp; &nbsp; &nbsp;
        <?php echo $pro_mostrar[4]; ?>   
     
          
      
        <?php
      

}
}
echo "</div><br><br> <button> <a href = 'menuautor.html'>Voltar</a></button>";?>
</div>

</body>
</html>