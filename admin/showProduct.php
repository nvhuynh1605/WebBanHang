<?php
function formatCurrency($number)
{
    return number_format($number, 0, ',', '.');
}

function showProduct()
{
    include 'connect.php' ?>

    <div class="details active">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Danh sách sản phẩm</h2>
                <div class="search">

<form action="find.php" method="POST">
    <input type="text" name="search" placeholder="Search here"></input>
    <button name="find" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

</div>
                <a href="addnewProduct.php" class="btn btn-primary">Thêm mới</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Mã sản phẩm</td>
                        <td>Mã danh mục</td>
                        <td>Tên sản phẩm</td>
                        <td>Số lượng</td>
                        <td>Giá</td>
                        <td>Ảnh</td>
                        <td>Sale</td>
                        
                    </tr>
                </thead>
                <?php
                $sql = "select * from product where status = 1";
                $result = $conn->query($sql);
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
                    echo "no result";
                }
                ?>
            </table>
        </div>
    </div>
<?php }

?>