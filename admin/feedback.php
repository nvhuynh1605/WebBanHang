<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="style.css">
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
include 'connect.php';
include 'showProduct.php'
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

                <li>
                    <a href="customer.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li class="active">
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
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details customer active">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Danh sách phản hồi</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Mã phản hồi</td>
                                <td>Tên người gửi</td>
                                <td>Số điện thoại</td>
                                <td>Email</td>
                                <td>Nội dung</td>
                            </tr>
                        </thead>
                        <?php
                        $sql = "select * from feedback";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['fb_id'] ?></td>
                                        <td><?php echo $row['ct_name'] ?></td>
                                        <td><?php echo $row['tel'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['content'] ?></td>
                                    </tr>
                                </tbody>
                        <?php }
                        } else {
                            echo "no result";
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
        <script src="main.js"></script>

        <!-- =========== Scripts =========  -->

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>