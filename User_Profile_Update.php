<?php

include 'php/config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['update'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   
   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $user_id]);

   $old_image = $_POST['old_image'];
   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'image/'. $image;

   if(!empty($image)){

      if($image_size > 2000000){
         $message[] = 'image size is too large';
      }else{
         $update_image = $conn->prepare("UPDATE `users` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $user_id]);

         if($update_image){
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('image/'.$old_image);
            $message[] = 'image has been updated!';
         }
      }

   }

   $old_pass = $_POST['old_pass'];
   $previous_pass = md5($_POST['previous_pass']);
   $previous_pass = filter_var($previous_pass, FILTER_SANITIZE_STRING);
   $new_pass = md5($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = md5($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($previous_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         $update_password = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_password->execute([$confirm_pass, $user_id]);
         $message[] = 'password has been updated!';
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

   <title>user profile update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<h1 class="title"> Atualize as informações </h1>

<section class="update-profile-container">

   <?php
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
      $select_profile->execute([$user_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

   <form action="" method="post" enctype="multipart/form-data">
   <img src="image/<?= $fetch_profile['image']; ?>" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>Nome </span>
            <input type="text" name="name" required class="box" placeholder="Digite seu nome" value="<?= $fetch_profile['name']; ?>">
            <span>Email </span>
            <input type="email" name="email" required class="box" placeholder="Digite seu email" value="<?= $fetch_profile['email']; ?>">
            <span>Foto de Perfil</span>
            <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
            <span>Senha Antiga:</span>
            <input type="password" class="box" maxlength = "3" name="previous_pass" placeholder="Digite a senha antiga" >
            <span>Senha Nova :</span>
            <input type="password" class="box" maxlength = "3" name="new_pass" placeholder="Digite a senha nova" >
            <span>Confirme a Senha :</span>
            <input type="password" class="box" maxlength = "3" name="confirm_pass" placeholder="Confirme a senha nova" >
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" value="Atualize o Perfil" name="update" class="btn">
         <a href="user_page.php" class="option-btn">Voltar</a>
      </div>
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