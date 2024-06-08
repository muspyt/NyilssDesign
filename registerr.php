<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:loginn.php');
      }
   }

}

?>

        <!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
        <link rel="Stylesheet" href="register.css">
    </head>
    <body>

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
       
        <div class="hero">
            <div class="form-box">

                <form action="" method="post" id="user" class="input-group">
                <div>
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="name" class="input-field" placeholder="Username"required>
                    </div>
                    <div>
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" class="input-field" placeholder="Email"required>
                    </div>
                    <div>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" class="input-field" placeholder="Password"required>
                    </div>
                    <div>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="cpassword" class="input-field" placeholder="Konfirmasi Password"required>
                    </div>
                    <select name="user_type" class="box">
                        <option value="user">user</option>
                    
                    </select>
            
                    <button type="submit" name="submit" class="submit-btn">Register</button>
                    <div class="daftar">
                        <p>Sudah punya akun? <a href="index.php">Login</a></p>
                    </div>
                </form>


            </div>
        </div>
                    

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>