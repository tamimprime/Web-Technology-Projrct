<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "e-commerce";

$con = new mysqli($hostname, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $_POST["username"];

    $pass = $_POST["pass"];

    $type = $_POST["type"];

    if (empty($user) || empty($pass)  || empty($type)) {
        $message = "Please Fill All The Filed Properly ";
        echo $message;
    } else {


        $sql = "SELECT * FROM registration WHERE username='$user' ";

        $stmt = $con->prepare($sql);



        $stmt->execute();

        $result = $stmt->get_result();



        $data = $result->fetch_assoc();





        if ($data) {

            $sql1 = "SELECT * FROM registration WHERE username='$user' and pass='$pass' and type='$type' ";

            $stmt1 = $con->prepare($sql1);



            $stmt1->execute();

            $res = $stmt1->get_result();



            $data1 = $res->fetch_assoc();

            if ($data1) {
                session_start();
                $_SESSION['username'] =  $_POST["username"];
                $isset = true;



                if ($isset && $type == "admin") {
                    $_SESSION['username'] = $user;
                    setcookie("username", $user, time() + 3600);
                    header("Location: ../view/adminhome.php");
                } else if ($isset && $type == "customer") {
                    $_SESSION['username'] = $user;
                    setcookie("username", $user, time() + 3600);
                    header("Location: ../view/home.php");
                } else if ($isset && $type == "delivery") {
                    $_SESSION['username'] = $user;
                    setcookie("username", $user, time() + 3600);
                    header("Location: ../view/delivery.php");
                } else {
                    $message = "Please Fill All The Filed Properly ";
                    echo $message;
                }
            } else {
                $message = "Something id wrong. Please try again !!!  ";
                echo $message;
            }
        } else {

            $message = "Username not found !!! Check your submission ";
            echo $message;
        }
    }
}
