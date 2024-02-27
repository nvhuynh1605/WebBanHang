<?php
include 'connect.php';
$id=$_GET['id_od'];

 $sql="UPDATE order_detail set status =1 where o_id=$id ";
 $query=mysqli_query($conn,$sql);

 header("Location:http://localhost/Nhóm 5_65PM1/admin/")
?>
