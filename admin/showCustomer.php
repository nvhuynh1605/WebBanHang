<?php
function showCustomer()
{
    include 'connect.php' ?>

    <div class="details customer active">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Danh sách khách hàng</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Mã người dùng</td>
                        <td>Tên đăng nhập</td>
                        <td>Email</td>
                        <td>Mật khẩu</td>
                        <td>Trạng thái</td>

                        
                    </tr>
                </thead>
                <?php
                $sql = "select * from user";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['u_id'] ?></td>
                                <td><?php echo $row['u_name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td><?php echo $row['status'] ?></td>
<?php
if ($row['status'] ==1){
?>
                                <td><button><a href="deleteCs.php?u_id=<?php echo $row['u_id']; ?>" onclick=" return confirm('Bạn có chắc muốn xóa người dùng này?')" class="btn btn-danger">Delete</a></button></td>
                                <?php }
                                else{?>
                                    <td><button><a href="deleteCs.php?u_id=<?php echo $row['u_id']; ?>" onclick=" return confirm('Bạn có chắc muốn người dùng này hoạt động trở lại?')" class="btn btn-primary">Active</a></button></td>
                              <?php  }
                                ?>

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