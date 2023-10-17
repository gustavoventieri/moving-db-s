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
        border-radius:   10px 10px 10px 10px ;
        margin-top: 4rem;
        margin-left: 40.8rem;
        background-color: #585858;
        width: 600px;
        height: 350px;
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
        width: 34rem;
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
<div class="mexer">
<form name = "cliente" method="POST" action>
  
    
        <p>Codigo do Livro</p><input class = "btn" type="text" name = "inputcl" required size = "50" maxlength="50" placeholder="Digite o id">
       


        

        <br>
        <input class = "btn2"type="submit" name = "btnenviar" value="Excluir"> &nbsp;&nbsp;
        <input class = "btn2"type="reset" name = "limpar" value="Limpar"> &nbsp;&nbsp;
        <button class = "btn2"><a href="menulivro.html">Voltar</a></button>
        <?php

extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar)) {
    include_once 'livro.php';
    $pro = new livro();
    $pro->setCod_livro($inputcl);
   
    echo "<he><br><br>" . $pro->exclusao() . "</h3>";

}
?>
</form>


</div>