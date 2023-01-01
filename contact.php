<?php

include 'connect.php';

session_start();



if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($db,$_POST['mobile']);
    $myusername = filter_var($myusername, FILTER_SANITIZE_STRING);
    $mypassword = mysqli_real_escape_string($db,$_POST['pass']);
    $mypassword = filter_var($mypassword, FILTER_SANITIZE_STRING); 
    $username = mysqli_real_escape_string($db,$_POST['name']);
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    
    $sql = "SELECT name FROM `message` WHERE `message`.`number` = '$myusername' AND `message`.`message`='$mypassword';";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
    //    session_register("myusername");
       
       
       $_SESSION['user_id'] = $myusername; 
       echo "<script>
                alert('We recived your message alreagy we are trying to contact you asap');
                window.location.href='home.php';
            </script>"; 
       
    }else {
        $insert_user = $db->prepare("INSERT INTO `message`(name, number, message) VALUES(?,?,?)");
         $insert_user->execute([$username, $myusername, $mypassword]);
         echo "<script>
                alert('we are trying to contact you asap');
                window.location.href='home.php';
            </script>"; 
         
    }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>book</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">SeniorCitizensHolidays.com</a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="international.php">International</a>
      <a href="domestic.php">Domestic</a>
      <a href="book.php">book</a>
      <a href="contact.php">Contact</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>Contact Us</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">Tell us Something</h1>

   <form action="" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>mobile :</span>
            <input type="mobile" placeholder="enter your mobile no" name="mobile">
         </div>
         <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name">
         </div>
         <div class="inputBox">
            <span>Message :</span>
            <input type="text" placeholder="enter your Message" name="pass">
         </div>
      </div>

      <input type="submit" value="submit" class="btn" name="send">
      <!-- <br>
      <span style="font-size:18px">already have an account? <a href="login.php">Click here</a></span> -->
   </form>

</section>

<!-- booking section ends -->

















<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
         <a href="#"> <i class="fas fa-envelope"></i> 21bcs032@iiitdmj.ac.in </a>
         <a href="#"> <i class="fas fa-map"></i> mumbai, india - 400104 </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>Arpan Karjee</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>