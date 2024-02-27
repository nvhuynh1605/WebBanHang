<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
    if(isset($_POST['send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $content = $_POST['content'];

        $sql = "insert into feedback(ct_name, email, tel, content) values('$name', '$email', '$tel', '$content')";
        $result = $conn->query($sql);
        if($result) {
            $_SESSION['message'] = "Gửi phản hồi thành công";
            header("Location: http://localhost/Nhóm 5_65PM1/contact.php");
        }
    }
?>