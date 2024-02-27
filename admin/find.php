<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
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
include 'connect.php';
if (isset($_POST['find'])) {
    $fd = $_POST['search'];
?>
    <div class="details active">
        <div class="recentOrders">
            <div class="cardHeader">

                <h2>Kết quả tìm kiếm</h2>
                <h2><a href='home.php'>Trở về</a></h2>

            </div>
            <table>
                <thead>
                    <tr>
                        <td>Pro_id</td>
                        <td>cate_id</td>
                        <td>pro_name</td>
                        <td>quantity</td>
                        <td>price</td>
                        <td>image</td>
                        <td>sale</td>
                        <td>edit</td>
                        <td>delete</td>
                    </tr>
                </thead>
                <?php
                $sql1 = "select * from product where pro_name like '%" . $fd . "%'";
               
                $result = $conn->query($sql1);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['pro_id'] ?></td>
                                <td><?php echo $row['cate_id'] ?></td>
                                <td><?php echo $row['pro_name'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['image'] ?></td>
                                <td><?php echo $row['sale'] ?></td>
                                <td><button><a href="editProduct.php?pro_id=<?php echo $row['pro_id'] ?>" class="btn btn-primary">edit</a></button></td>
                                <td><button><a href="deleteProduct.php?pro_id=<?php echo $row['pro_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-danger">delete</a></button></td>
                            </tr>
                        </tbody>
            <?php }
                } else {
                    
                    echo "<script type='text/javascript'>alert('Không tìm thấy sản phẩm');
    window.location.href = 'http://localhost/Nhóm 5_65PM1/admin';
    </script>";
                }
            
            ?>
            </table>
        </div>
    </div>
    <?php } ?>
  
    <?php
    if(isset($_POST['find_cs'])){
        $fc=$_POST['search_cs'];
    
    ?>
        <div class="details customer active">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Kết quả tìm kiếm</h2>
                <h2><a href='javascript:history.back()'>Trở về</a></h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>user_id</td>
                        <td>username</td>
                        <td>email</td>
                        <td>password</td>
                        <td>status</td>

                        <td>delete</td>
                    </tr>
                </thead>
                <?php
             
                $sql2 = "select * from user where u_name like '%" . $fc . "%'";
                $result = $conn->query($sql2);
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
                                    <td><button><a href="deleteCs.php?u_id=<?php echo $row['u_id']; ?>" onclick=" return confirm('Bạn có chắc muốn người dùng này hoạt động trở lại?')" class="btn btn-primary">Online</a></button></td>
                              <?php  }
                                ?>

                            </tr>
                        </tbody>
                <?php }
                } else {
                   
                    echo "<script type='text/javascript'>alert('Không tìm thấy người dùng');
    window.location.href = 'http://localhost/Nhóm 5_65PM1/admin';
    </script>";
                }
                ?>
            </table>
        </div>
    </div>
    <?php } ?>
    <?php
include 'connect.php';
if (isset($_POST['find_od'])) {
    $fod = $_POST['search_od'];
?>
    <div class="details active">
        <div class="recentOrders">
            <div class="cardHeader">

                <h2>Kết quả tìm kiếm</h2>
                <h2><a href='home.php'>Trở về</a></h2>

            </div>
            <table>
                <thead>
                    <tr>
                    <td>o_id</td>
                        <td>pro_name</td>
                        <td>fullname</td>
                        <td>quantity</td>
                        <td>price</td>
                        <td>address</td>
                        <td>datetime</td>
                    </tr>
                </thead>
                <?php
                $sql3 = "select * from order_detail where fullname like '%" . $fod . "%'";
               
                $result3 = $conn->query($sql3);

                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) { ?>
                        <tbody>
                            <tr>
                            <td><?php echo $row3['o_id'] ?></td>
                                <td><?php echo $row3['pro_name'] ?></td>
                                <td><?php echo $row3['fullname'] ?></td>
                                <td><?php echo $row3['quantity'] ?></td>
                                <td><?php echo $row3['price'] ?></td>
                                <td><?php echo $row3['address'] ?></td>
                                <td><?php echo $row3['date_time'] ?></td>
                                <?php if ($row3['status']==0){?>
                                <td><button><a href="od_tt.php?id_od=<?php echo $row3['o_id'];?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-warning">Đang giao</a></button></td>
                              <?php } 
                              elseif ($row3['status']==1){
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
                    
                    echo "<script type='text/javascript'>alert('Không tìm thấy sản phẩm');
    window.location.href = 'http://localhost/Nhóm 5_65PM1/admin';
    </script>";
                }
            
            ?>
            </table>
        </div>
    </div>
    <?php } ?>