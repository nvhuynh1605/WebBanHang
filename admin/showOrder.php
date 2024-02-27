<?php
function showOrder()
{
    include 'connect.php' ?>

    <div class="details order">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Danh sách đơn hàng</h2>
                <div class="search">

<form action="find.php" method="POST">
    <input type="text" name="search_od" placeholder="Search here"></input>
    <button name="find_od" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

</div>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <td>Mã đơn hàng</td>
                        <td>Tên sản phẩm</td>
                        <td>Tên khách hàng</td>
                        <td>Số lượng</td>
                        <td>Giá</td>
                        <td>Địa chỉ</td>
                        <td>Thời gian đặt</td>
                        
                    </tr>
                </thead>
                <?php
                $sql = "select * from order_detail";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['o_id'] ?></td>
                                <td><?php echo $row['pro_name'] ?></td>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['date_time'] ?></td>
                                <?php if ($row['status']==0){?>
                                <td><button><a href="od_tt.php?id_od=<?php echo $row['o_id'];?>" onclick="return confirm('Bạn có chắc muốn hoàn thành giao sản phẩm này không?')" class="btn btn-warning">Đang giao</a></button></td>
                              <?php } 
                              elseif ($row['status']==1){
                                ?>
                                <td><button><a class="btn btn-success">Hoàn thành</a></button></td>
                              <?php } else
                              {?>
                              <td><button><a class="btn btn-secondary">Đã huỷ</a></button></td>
                              <?php } ?>
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
<?php }

?>