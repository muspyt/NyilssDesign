<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Account</title>
        <link rel="Stylesheet" href="login.css">
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
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="user()">User</button>
                    <button type="button" class="toggle-btn" onclick="admin()">Admin</button>
                </div>

                <form action="" method="post" id="user" class="input-group">
                    <div>
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" class="input-field" placeholder="Email"required>
                    </div>
                    <div>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" class="input-field" placeholder="Password"required>
                    </div>
            
                    <button type="submit" name="submit" class="submit-btn">Log In</button>
                    <div class="daftar">
                        <p>Belum punya akun? <a href="registerr.php">Register</a></p>
                    </div>
                </form>
                <form action="" method="post" name="submit" id="admin" class="input-group">
                    <div>
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="email" name="email" class="input-field" placeholder="Email"required>
                    </div>
                    <div>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" class="input-field" placeholder="Password"required>
                    </div>
                    <button type="submit" name="submit" class="submit-btn">Log In</button>
                    
                </form>


            </div>
        </div>
                    

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script>
            var x = document.getElementById("user");
            var Y = document.getElementById("admin");
            var Z = document.getElementById("btn");

            function admin(){
                x.style.left = "-400px";
                Y.style.left = "50px";
                Z.style.left = "110px";
                
            }
            function user(){
                x.style.left = "50px";
                Y.style.left = "450px";
                Z.style.left = "0";
                
            }

        </script>
    </body>
</html>

