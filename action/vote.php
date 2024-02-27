<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');

    $pro_id = $_GET['pro_id'];
    if(!isset($_SESSION['u_id'])) {
        header("Location: http://localhost/Nhóm 5_65PM1/login_form.php");
    } else {
        $u_id = $_SESSION['u_id'];
        if(isset($_POST['vote'])){
            if(!isset($_POST['star']) || $_POST['star'] == null) {
                $_SESSION['err_ms'] = "Vui lòng chọn số sao";
                header("Location: http://localhost/Nhóm 5_65PM1/product.php?pro_id=$pro_id");
            }else {
                $star = (int)$_POST['star'];
                $sql = "insert into vote(u_id, pro_id, star) values($u_id, $pro_id, $star)";
                $result = $conn->query($sql);
    
                header("Location: http://localhost/Nhóm 5_65PM1/product.php?pro_id=$pro_id");
            }
        }
    }
  
?>