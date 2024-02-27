<head>
    <title>Edit Category</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input[type=submit] {
            margin-top: 20px;
            padding: 0 10px;
        }
    </style>
</head>
<?php
include "connect.php";

$id = $_GET['id'];
$sql = "SELECT * FROM category WHERE cate_id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<body>

    <div class="main_form">
        <div class="overlay"></div>
        <div class="body">
            <div class="info">
                <div class="container">
                    <form action="del_ct.php?id=<?php echo $row['cate_id'] ?>" method="post">
                        <table>

                            <tr>
                                <td> Mã danh mục </td>
                                <td> <input type="text" name="cate_id" value="<?php echo $row['cate_id'] ?>"></td>
                            </tr>
                            <tr>
                                <td> Tên danh mục </td>
                                <td> <input type="text" name="cate_name" value="<?php echo $row['cate_name'] ?>"></td>
                            </tr>
                            <tr>
                                <td> Trạng thái </td>
                                <td> <input type="text" name="status" value="<?php echo $row['status'] ?>"></td>

                            </tr>
                            <tr>
                             
                                
                            </tr>
                            <tr>
                                <td><input type="submit" value="Cập nhật" name="edit"></td>
                                <td><input type="submit" value="Xoá" name="del"></td>
                            </tr>
                           

                        </table>
                    </form>
                </div>
                <div class="close">
                    &times
                </div>
            </div>
        </div>
    </div>

    <script>
        let close = document.querySelector(".close");
        close.onclick = function() {
            window.location = "http://localhost/Nhóm 5_65PM1/admin/";
        }
    </script>
</body>