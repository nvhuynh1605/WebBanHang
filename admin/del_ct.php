<?php
include 'connect.php';
$id=$_POST['cate_id'];
$name=$_POST['cate_name'];
$status=$_POST['status'];
if(isset($_POST['edit'])){
   $sql="update category set cate_name='$name', status='$status' where cate_id='$id'";
   $result=mysqli_query($conn,$sql);
   header("Location: http://localhost/Nhóm 5_65PM1/admin/");
}
if(isset($_POST['del'])){
    $sql1="update category set status= 0 where cate_id='$id'";
    $kq=mysqli_query($conn,$sql1);
    header("Location: http://localhost/Nhóm 5_65PM1/admin/");
}
?>