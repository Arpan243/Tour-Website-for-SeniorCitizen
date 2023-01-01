<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};
$temp = ($_SESSION['user_id']);
   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['mobile'];
      $address = $_POST['address'];
      $location = $_POST['location'];
      $guests = $_POST['guests'];
      $arrivals = $_POST['arrivals'];
      $leaving = $_POST['leaving'];

      $request = " insert into bookings(name, email, phone, address, location, guests, arrivals, leaving) values('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving') ";
      mysqli_query($db, $request);

      session_unset();
      session_destroy();

header('location:../home.php');

      header('location:book.php'); 

   }else{
      echo 'something went wrong please try again!';
   }

?>