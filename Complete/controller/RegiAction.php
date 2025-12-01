<?php

echo "<br>";
echo "<br>";

if ($_SERVER['REQUEST_METHOD'] === "POST") {


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $add = $_POST['address'];
    $mail = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $phn = "null";

    if (empty($fname) || empty($lname) || empty($dob) || empty(isset($_POST['gender'])) || empty(isset($_POST['type']))  ||  empty($add) || empty($mail) || empty($phn) || empty($username) || empty($pass)) {
        $message = "Please Fill The Form Properly ";
        echo $message;
    } else {


        $type = $_POST['type'];
        $gender = $_POST['gender'];
        $user = validate($username);
        $user = sanitize($username);
        $pass = validate($pass);
        $fname = validate($fname);
        $fname = sanitize($fname);
        $lname = validate($lname);
        $lname = sanitize($lname);
        $dob = validate($dob);
        $gender = validate($gender);
        $type = validate($type);
        $add = validate($add);
        $add = sanitize($add);
        $mail = validate($mail);


        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "e-commerce";

        $con = new mysqli($hostname, $username, $password, $database);

        $found = "SELECT * FROM registration WHERE username= '$user'";
        $stmt = $con->prepare($found);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if ($data) {
            $message = "User Name already taken ";
            echo $message;
        }


        $sql = "INSERT INTO registration (username, pass,type, fname, lname, dob, gender, address, phn, email) VALUES ('$user','$pass','$type', '$fname','$lname','$dob','$gender','$add','$phn','$mail')";
        $stmt = $con->query($sql);

        if ($stmt === true) {
            echo "Registration Successful..!";
        } else {
            $message = "Error while saving ";
            echo $message;
        }
    }
}








function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
