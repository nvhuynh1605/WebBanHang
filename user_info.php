<?php
    session_start();
    include 'header.php';
    include 'function.php';
    $conn = mysqli_connect('localhost', 'root', '', 'doan') or die('k the ket noi');
    $u_id = $_SESSION['u_id'];
?>

<head>
    <style>
        .order-info{
            margin-top: 30px;
            font-size: 5.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        th {
            text-align:center;
            padding: 10px;
        }
        td {
            padding:10px;
            text-align:center;
        }
        td button {
            border: none;
            background-color: red;
        }
        td button a{
            font-size: 1.6rem;
            color: white;
            padding: 4px ;
        }
        td button a:hover {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
        <body>
            
            <center>
            <table class="order-info">
                <h2 style="margin-top: 30px">Sản phẩm đã đặt</h2>
                <tr>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Họ tên người nhận</th>
                    <th>Ngày đặt hàng</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            <?php
                $sql = "select * from order_detail where u_id = $u_id order by date_time desc";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><img style="width:100px; height:auto" src="image/<?php echo $row['image']?>" alt=""></td>
                        <td><?php echo $row['pro_name']?></td>
                        <td><?php echo $row['fullname']?></td>
                        <td><?php echo $row['date_time']?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td><?php echo formatCurrency($row['price'])?></td>
                        <?php
                            if($row['status'] == 0) {?>
                                <td>Đang giao</td>
                                <td><button><a href="action/deleteOrder.php?o_id=<?php echo $row['o_id']?>">Hủy</a></button></td>
                            <?php } else { ?>
                                <td><?php echo ($row['status'] == 1) ? "Đã giao" : "Đã hủy"?></td>
                            <?php }
                        ?>
                    </tr>
                <?php }
            ?>
            </table>
            </center>

            <?php
                include 'footer.php';
            ?>

        </body>


