<?php
session_start();
if (count($_SESSION) === 0) {
  header("location: ../controller/logout.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pass = $_POST['u_pass'];
  $name = $_POST['u_name'];
  $dob = $_POST['u_dob'];
  $email = $_POST['u_email'];
  $gender = $_POST['u_gender'];
  // $photo = $_POST['u_photo'];
  $user = $_SESSION['username'];







  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "e-commerce";

  $con = new mysqli($hostname, $username, $password, $database);


  $sql = "UPDATE registration set name='$name',dob='$dob',gender='$gender',email='$email', pass='$pass' where username ='$user' ";

  $data = $con->query($sql);

  if ($data === TRUE) {

    $message = "Information has been updated";
    echo $message;
  } else {

    $message = "Failed updating ";
    echo $message;
  }
}
