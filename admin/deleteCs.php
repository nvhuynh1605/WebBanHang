<?php
include 'connect.php';
if (isset($_GET['u_id'])) {
    $u_id = $_GET['u_id'];

    $sql = "update user set status = case when status =0 then 1 else 0 end where u_id = $u_id";
    $result = $conn->query($sql);

    header("Location: http://localhost/Nhóm 5_65PM1/admin/customer.php");
}
