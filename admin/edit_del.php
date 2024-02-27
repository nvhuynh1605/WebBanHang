<?php
include 'connect.php';
$id=$_GET['id_cmt'];

$sql='DELETE FROM comment WHERE cmt_id= '.$id.' LIMIT 1';
$result = mysqli_query($conn,$sql);
header("Location: http://localhost/Nhóm 5_65PM1/admin/");
?>