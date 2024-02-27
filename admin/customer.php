<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="form.css"> -->
    <style>
        a {
            text-decoration: none;
            padding: 5px;
            color: black;
        }
    </style>
</head>
<?php
include 'connect.php'
?>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="admin/home.php">
                        <span class="icon">
                            <ion-icon name="watch"></ion-icon>
                        </span>
                        <span class="title">Watch Shop</span>
                    </a>
                </li>

                <li >
                    <a href="home.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="active">
                    <a href="customer.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="feedback.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Feed Back</span>
                    </a>
                </li>
                <li>
                    <a href="statistics.php">
                        <span class="icon">
                            <ion-icon name="calculator-outline"></ion-icon>
                        </span>
                        <span class="title">Statistics</span>
                    </a>
                </li>





               
                <li>
                    <a href="http://localhost/Nhóm 5_65PM1/login_form.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <form action="find.php" method="POST">
                        <input type="text" name="search_cs" placeholder="Search here"></input>
                        <button name="find_cs" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                </div>

              
            </div>

            <!-- ================ Order Details List ================= -->
            <?php include 'showCustomer.php';
            showCustomer(); ?>

        </div>
        <script src="main.js"></script>

        <!-- =========== Scripts =========  -->

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>