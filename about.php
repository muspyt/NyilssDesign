<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tentang Kami</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Tentang Kami</h3>
   <p> <a href="home.php">Beranda</a> / Tentang Kami </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/popol.jpg" alt="">
      </div>

      <div class="content">
         <h3>Mengapa memilih kami?</h3>
         <p>Nyils Design adalah website yang didalamnya terdapat banyak desain produk seperti desain mock up kaos, desain kemasan, desain logo, dan masih banyak lagi. Dalam website ini pengguna dapat membeli dan mengunduh desain yang diinginkan. Kami membangun website ini untuk mempermudah seseorang ketika ingin membuat sebuah desain tetapi tidak memiliki keahlian dalam bidang desain.
  </p>
         <a href="contact.php" class="btn">Hubungi Kami  </a>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>