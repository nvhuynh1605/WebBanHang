<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'doan') or die('Không thể kết nối!');
if (isset($_POST['rs']))
    $name = $_POST['u_name'];
$mail = $_POST['u_email'];
$pass1 = $_POST['u_pass1'];
$pass = $_POST['u_pass'];
if ($pass == $pass1) {
    $sql_ck = "select u_name from user";
    $query1 = mysqli_query($conn, $sql_ck);
    $a = mysqli_fetch_array($query1);
    if ($name == $a['u_name'] || $name == "admin") {
        echo "<script type='text/javascript'>alert('Trùng tên tài khoản');
    window.history.back();
    </script>";
    } else {

        $sql = "INSERT INTO user (u_name,email,password,status )
    VALUE ('$name','$mail','$pass',1)";
        $query = mysqli_query($conn, $sql);

        $sql2 = "select * from user where u_name = '$name' and password = '$pass'";
        $result = $conn->query($sql2);
        $row = $result->fetch_assoc();
        $y = $row['u_id'];

        $message = "Đăng kí thành công";
        echo "<script type='text/javascript'>alert('$message');
    window.location='http://localhost/Nhóm 5_65PM1/login_form.php';
    </script>";
    }
}
