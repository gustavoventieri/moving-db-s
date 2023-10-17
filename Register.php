<?php

include 'php/config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'image/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'usuario existente';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirmar senha não corresponde';
      }elseif($image_size > 2000000){
         $message[] = 'Imagem muito grande';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $cpass, $image]);
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registro Feito com Sucesso';
            header('location:login.php');
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>




   
<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Cadastre-se</h3>
      <input type="text" required placeholder="Digite seu nome" class="box" name="name">
      <input type="email" required placeholder="Digite seu email" class="box" name="email">
      <input type="password" required placeholder="Digite sua senha  " maxlength = "3" class="box" name="pass">
      <input type="password" required placeholder="Confirme sua senha" maxlength = "3" class="box" name="cpass">
      <input type="file" name="image" required class="box" accept="image/jpg, image/png, image/jpeg">
      <p>Não tem conta? <a href="login.php">Entrar</a></p>
      <input type="submit" value="Registrar-se" class="btn" name="submit">
      <br>
      <?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
   </form>
 
  
</section>



</body>
</html>