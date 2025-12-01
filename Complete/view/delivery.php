<?php
session_start();

// if (isset($_COOKIE['flag'])) {
include("../model/config.php");
$Username = $_SESSION['username'];

$query = "SELECT * FROM registration WHERE username='$Username'";
$query_run = mysqli_query($conn, $query);

// check if profile exists
if (mysqli_num_rows($query_run) > 0) {
    $row = mysqli_fetch_assoc($query_run);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Profile</title>

</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#" font-weight="500">
                <img src="images/logo.png" width="159" height="41" class="d-inline-block align-top pt-49 pb-69" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="delivery.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $row['username']; ?></span><span class="text-black-50"><?php echo $row['type']; ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input disabled type="text" class="form-control" placeholder="first name" value="<?php echo $row['fname']; ?>"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input disabled type="text" class="form-control" value="<?php echo $row['lname']; ?>"></div>
                        <div class="col-md-6"><label class="labels">Date of Birth</label><input disabled type="text" class="form-control" value="<?php echo $row['dob']; ?>"></div>
                        <div class="col-md-6"><label class="labels">Gender</label><input disabled type="text" class="form-control" value="<?php echo $row['gender']; ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input disabled type="text" class="form-control" value="<?php echo $row['phn']; ?>"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input disabled type="text" class="form-control" value="<?php echo $row['address']; ?>"></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input disabled type="text" class="form-control" value="<?php echo $row['email']; ?>"></div>
                        <div class="col-md-12"><label class="labels">Password</label><input disabled type="text" class="form-control" value="<?php echo $row['pass']; ?>"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </main>

    <footer>
        <?php
        include './footer.php';
        ?>
    </footer>

    <!-- <script src="./js/header.js"></script> -->

</body>

</html>

<?php
// }
// else {
//     header('location: ../control/login.php');
// }
?>