<?php
session_start();
unset($_SESSION['u_id']);
if(isset($_SESSION['pro_id'])) {
    $x = $_SESSION['pro_id'];
    header("Location: http://localhost/Nhóm 5_65PM1/product.php?pro_id=$x");
    unset($_SESSION['pro_id']);
} else {
    header("Location: http://localhost/Nhóm 5_65PM1/");
}

?>