<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistic</title>
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

                <li>
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

                <li>
                    <a href="feedback.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">FeedBacks</span>
                    </a>
                </li>

                <li class="active">
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
                        <h2>Thống kê</h2>
                    </div>
                    <form action="">
                        <table>
                            <tbody>
                                <tr>
                                    <th><label for="">Doanh thu: </label></th>
                                    <td><p>
                                        <?php
                                            $sql = "select sum(price) as total from order_detail WHERE status = 1";
                                            $result = $conn->query($sql);
                                            $row = $result->fetch_assoc();
                                            echo formatCurrency($row['total']);
                                        ?>
                                    đ</p></td>
                                </tr>
                                <tr>
                                    <th><label for="">Doanh thu tháng <?php echo date('m')?>: </label></th>
                                    <td><p>
                                        <?php
                                            $year = date('Y');
                                            $month = date('m');
                                            $sql1 = "select sum(price) as total from order_detail WHERE status = 1 and month(date_time) = $month
                                                    and year(date_time) = $year";
                                            $result1 = $conn->query($sql1);
                                            $row1 = $result1->fetch_assoc();
                                            echo formatCurrency($row1['total']);
                                        ?>
                                    đ</p></td>
                                </tr>
                                <tr>
                                    <th><label for="">Sản phẩm bán chạy nhất: </label></th>
                                    <td><p>
                                        <?php
                                            $sql2 = "select pro_name ,sum(quantity) as total from order_detail WHERE status = 1 or status = 0
                                                    group by pro_id order by total desc limit 1";
                                            $result2 = $conn->query($sql2);
                                            $row2 = $result2->fetch_assoc();
                                            echo $row2['pro_name'];
                                        ?>
                                    </p></td>
                                    <td><p>Số lượng đã bán:
                                        <?php
                                            echo $row2['total'];
                                        ?>
                                    </p></td>
                                </tr>
                                <tr>
                                    <th><label for="">Sản phẩm bán chạy nhất tháng <?php echo date('m')?>: </label></th>
                                    <td><p>
                                        <?php
                                            $sql2 = "select pro_name ,sum(quantity) as total from order_detail WHERE status = 1 or status = 0 and month(date_time) = $month
                                            and year(date_time) = $year group by pro_id order by total desc limit 1";
                                            $result2 = $conn->query($sql2);
                                            $row2 = $result2->fetch_assoc();
                                            echo $row2['pro_name'];
                                        ?>
                                    </p></td>
                                    <td><p>Số lượng đã bán:
                                        <?php
                                            echo $row2['total'];
                                        ?>
                                    </p></td>
                                </tr>
                                <tr>
                                    <th><label for="">Sản phẩm được đánh giá nhiều nhất: </label></th>
                                    <td><p>
                                        <?php
                                            $sql3 = "select product.pro_name ,count(*) as total from vote, product WHERE product.pro_id = vote.pro_id 
                                            group by vote.pro_id order by total desc limit 1";
                                            $result3 = $conn->query($sql3);
                                            $row3 = $result3->fetch_assoc();
                                            echo $row3['pro_name'];
                                        ?>
                                    </p></td>
                                    <td><p>Số lượt đánh giá:
                                        <?php
                                            echo $row3['total'];
                                        ?>
                                    </p></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
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