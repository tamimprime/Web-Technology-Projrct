<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <title>Online Shop</title>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Body -->
    <main>
        <div class='catagories'>
            <!-- Catagories -->
            <h2>Catagories</h2>
            <?php include 'category.php'; ?>
        </div>


        <!-- Products -->
        <div class='products' style="margin-bottom: 150px;">
            <section id="products" class="container my-5">
                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4">
                    <?php
                    require("../model/config.php");

                    $query = "SELECT * FROM products";
                    $query_run = mysqli_query($conn, $query);
                    $check_product = mysqli_num_rows($query_run) > 0;

                    if ($check_product) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                            <div class="product">
                                <div class="col">
                                    <div class="card h-100 border-0 shadow-lg">
                                        <img src="<?php echo $row['image']; ?>" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['pname']; ?></h5>
                                            <p class="card-text"><?php echo $row['pdetails']; ?></p>
                                            <h5>TK <?php echo $row['price']; ?></h5>
                                        </div>
                                        <div class="m-3">
                                            <a href="payment.php"><button class="buy-now-button">Buy Now >></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php


                        }
                    } else {
                        echo "No product found";
                    }

                    ?>
                </div>
            </section>
        </div>





    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap Js -->
    <script src="js/bootstrap.bundle.min.js"></script>

</body>



</html>