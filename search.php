<head>

</head>
<?php
session_start();
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "doan") or die("Không thể kết nối");

$_SESSION['search'] = $_POST['search_val']
?>

<body>

    <section id='category1' class="product__love">
        <div class="container">
            <div class="row bg-white">
                <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                    <h2 class="product__love-heading upper">
                        Kết quả tìm kiếm cho "
                        <?php
                            if(isset($_SESSION['search'])) {
                                echo $_SESSION['search'];
                            }
                        ?>
                    "</h2>
                </div>
            </div>
            <div class="row bg-white">
                <?php
                    $search_val = $_SESSION["search"];
                    $sql = "SELECT * from product where pro_name LIKE '%$search_val%' and STATUS = 1 AND quantity > 0";
                    $result = $conn->query($sql);
                    if($result -> num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                            if($row['sale'] != 0) {
                            ?>
                <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">
                    <div class="product__panel-img-wrap">
                        <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img
                                src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                    </div>
                    <h3 class="product__panel-heading">
                        <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link">
                            <?php echo $row['pro_name']?>
                        </a>
                    </h3>
                    <div class="product__panel-rate-wrap">
                        <i class="fas fa-star product__panel-rate"></i>
                        <i class="fas fa-star product__panel-rate"></i>
                        <i class="fas fa-star product__panel-rate"></i>
                        <i class="fas fa-star product__panel-rate"></i>
                        <i class="fas fa-star product__panel-rate"></i>
                    </div>

                    <div class="product__panel-price">
                        <span class="product__panel-price-old ">
                            <?php require_once 'function.php'; echo formatCurrency( $row['price'])?>đ
                        </span>
                        <span class="product__panel-price-current">
                            <?php require_once 'function.php'; echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                        </span>
                    </div>

                    <div class="product__panel-price-sale-off">
                        <?php echo $row['sale']?>%
                    </div>
                </div>
                <?php }
                        else { ?>
                            <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">
                            <div class="product__panel-img-wrap">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img" ></a>
                            </div>
                            <h3 class="product__panel-heading">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link"><?php echo $row['pro_name']?> 
                                </a>
                            </h3>
                            <div class="product__panel-rate-wrap">
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                                <i class="fas fa-star product__panel-rate"></i>
                            </div>
        
                            <div class="product__panel-price">
                                <span class="product__panel-price-current">
                                    <?php require_once 'function.php'; echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ    
                                </span>
                            </div> 
        
                            <div class="product__panel-price-sale-off">
                                <?php echo $row['sale']?>%
                            </div> 
                        </div>
    
                    <?php }
                        }
                    } else {
                        ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                            <h2 class="product__love-heading upper">
                                Không có kết quả tìm kiếm cho từ khóa "
                                <?php
                                    if(isset($_SESSION['search'])) {
                                        echo $_SESSION['search'];
                                    }
                                ?>
                            "</h2>
                        </div>
                        <div style="height: 210px"></div>
                    <?php }

                    ?>
            </div>
        </div>
        
    </section>

    <?php include 'footer.php';
    ?>
</body>
