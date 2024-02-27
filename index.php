<?php
session_start();
include 'header.php';
include "function.php";
unset($_SESSION['pro_id']);
?>
<?php
    $conn = mysqli_connect('localhost','root','','doan') or die('Không thể kết nối!');
?>
<section class="menu-slide">
    <div class="container">
        <div class="row">
            <nav class="menu__nav col-lg-3 col-md-12 col-sm-0">

            </nav>

            <div class="slider col-lg-9 col-md-12 col-sm-0">
                <div class="row">
                    <div class="slide__left col-lg-8 col-md-0 col-sm-0">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                            data-interval="3000">
                            <!-- <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol> -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img style="width: 800px; height: 300px;" src="images/ad1.png" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img style="width: 800px; height: 300px;" src="images/ad2.jpg" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img style="width: 800px; height: 300px;" src="images/ad3.jpg"
                                        class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="slide__left-bottom">
                            <div class="slide__left-botom-one">
                                <img style="width: 400px; height: 150px;" src="images/ad1.png"
                                    class="slide__left-bottom-one-img">
                            </div>
                            <div class="slide__left-bottom-two">
                                <img style="width: 400px; height: 150px;" src="images/ad2.jpg"
                                    class="slide__left-bottom-tow-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<button onclick="topFunction()" id="myBtn-scroll" title="Go to top"><i class="fas fa-chevron-up"></i></i></button>
<!-- bestselling product -->
<section class="bestselling">
    <div class="container">
        <div class="row">
            <div class="bestselling__heading-wrap">
                <div class="bestselling__heading">Top bán chạy nhất</div>
            </div>
        </div>

        <section class="row">
            <?php
                        $sql = "SELECT * FROM product where status = 1 and quantity > 0 order by sold desc limit 6";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) { 
                                if ($row['sale'] != 0) { 
                                ?>
            <div class="bestselling__product col-lg-4 col-md-6 col-sm-12">
                <div class="bestselling__product-img-box">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="Biểu tượng thất truyền"
                        class="bestselling__product-img"></a>
                </div>
                <div class="bestselling__product-text">
                    <h3 class="bestselling__product-title">
                        <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="bestselling__product-link">
                            <?php echo $row['pro_name']?>
                        </a>
                    </h3>

                    <?php showStar2($row['pro_id']);?>

                    <span style="font-size: 1.4rem; color: black; text-decoration: line-through;"
                        class="bestselling__product-price">
                        <?php  echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php  echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                    </span>

                    <div class="product__panel-price-sale-off">
                        <?php echo $row['sale']?>%
                    </div>

                    <div class="bestselling__product-btn-wrap">
                        <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>"><button
                            class="bestselling__product-btn">Xem hàng</button></a>
                    </div>
                </div>
            </div>
            <?php }
                     else { ?>
            <div class="bestselling__product col-lg-4 col-md-6 col-sm-12">
                <div class="bestselling__product-img-box">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="Biểu tượng thất truyền"
                        class="bestselling__product-img">
                </div></a>
                <div class="bestselling__product-text">
                    <h3 class="bestselling__product-title">
                        <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="bestselling__product-link">
                            <?php echo $row['pro_name']?>
                        </a>
                    </h3>

                    <?php showStar2($row['pro_id']);?>

                    <span style="font-size: 1.6rem" class="product__panel-price-current">
                        <?php echo formatCurrency($row['price'])?>đ
                    </span>

                    <div class="product__panel-price-sale-off">
                        <?php echo $row['sale']?>%
                    </div>

                    <div class="bestselling__product-btn-wrap">
                        <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>"><button
                                class="bestselling__product-btn">Xem
                                hàng</button></a>
                    </div>
                </div>
            </div>
            <?php 
                     }}
                        } else {
                            echo "0 results";
                        }
                    ?>
        </section>
    </div>
</section>

<section class="product">
    <div class="container">
        <div class="row">
            <aside class="product__sidebar col-lg-3 col-md-0 col-sm-12">
                <div class="product__sidebar-heading">
                    <div class=""></div>
                    <h2 style="padding-left: 10%" class="product__sidebar-title">Sản phẩm mới</h2>
                </div>

                <nav class="product__sidebar-list">

                    <div class="row">
                        <div class="product__sidebar-item col-lg-6">
                            <img src="image/10.jpg" alt="" class="product__sidebar-item-img">
                            <a href="" class="product__sidebar-item-name"></a>
                        </div>
                        <div class="product__sidebar-item col-lg-6">
                            <img src="image/5.jpg" class="product__sidebar-item-img">
                            <a href="" class="product__sidebar-item-name"></a>
                        </div>
                        <div class="product__sidebar-item col-lg-6">
                            <img src="image/6.jpg" alt="" class="product__sidebar-item-img">
                            <a href="" class="product__sidebar-item-name"></a>
                        </div>
                        <div class="product__sidebar-item col-lg-6">
                            <img src="image/14.png" alt="" class="product__sidebar-item-img">
                            <a href="" class="product__sidebar-item-name"></a>
                        </div>
                    </div>
                </nav>
            </aside>

            <article class="product__content col-lg-9 col-md-12 col-sm-12">
                <nav class="row">
                </nav>

                <div class="row product__panel">
                    <?php
                        $results_per_page = 8;
                        $query = "SELECT * FROM product where status = 1 and quantity > 0 order by dateadd desc";
                        $result = $conn->query($query);
                            
                        $number_of_result = mysqli_num_rows($result);

                        $number_of_page = ceil ($number_of_result / $results_per_page);


                            if (!isset ($_GET['page']) ) {

                                $page = 1;
                                
                                } else {
                                
                                $page = $_GET['page'];
                                
                                }

                        $page_first_result = ($page-1) * $results_per_page;

                        $sql = "SELECT * FROM product where status = 1 and quantity > 0 order by dateadd desc LIMIT " . $page_first_result . ',' . $results_per_page;

                        $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) { 
                                if ($row['sale'] != 0) {?>
                    <div class="product__panel-item col-lg-3 col-md-4 col-sm-6">
                        <div class="product__panel-item-wrap">
                            <div class="product__panel-img-wrap">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                            </div>
                            <h3 class="product__panel-heading">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link">
                                    <?php echo $row['pro_name']?>
                                </a>
                            </h3>
                            <?php showStar($row['pro_id']);?>

                            <div class="product__panel-price">
                                <span class="product__panel-price-old">
                                    <?php echo formatCurrency($row['price'])?>đ
                                </span>
                                <span class="product__panel-price-current">
                                    <?php echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                                </span>
                            </div>

                            <div class="product__panel-price-sale-off">
                                <?php echo $row['sale'],'%'?>
                            </div>

                            <div class="bestselling__product-btn-wrap">
                                <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>"><button class="bestselling__product-btn">
                                    Xem hàng</button></a>
                            </div>
                        </div>
                    </div>
                    <?php }
                                    else { ?>
                    <div class="product__panel-item col-lg-3 col-md-4 col-sm-6">
                        <div class="product__panel-item-wrap">
                            <div class="product__panel-img-wrap">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                            </div>
                            <h3 class="product__panel-heading">
                                <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link">
                                    <?php echo $row['pro_name']?>
                                </a>
                            </h3>

                            <?php showStar($row['pro_id']);?>

                            <div class="product__panel-price">
                                <span class="product__panel-price-current">
                                    <?php echo formatCurrency($row['price'])?>đ
                                </span>
                            </div>

                            <div class="product__panel-price-sale-off">
                                <?php echo $row['sale'],'%'?>
                            </div>

                            <div class="bestselling__product-btn-wrap">
                                <a style="text-decoration: none;" href="product.php?pro_id=<?php echo $row['pro_id']?>">
                                <button class="bestselling__product-btn">Xemhàng</button></a>
                            </div>
                        </div>
                    </div>

                    

                    <?php
                                }} 
                            } 
                            ?>
                </div>
                    <div class="pagination">
                        <?php
                            for($page = 1; $page<= $number_of_page; $page++) {?>

                                <a style="text-decoration:none;" href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a>
                            
                            <?php }
                        ?>
                    </div>
            </article>
        </div>
    </div>
</section>
<!--end product -->

<!-- product love -->
<section class="product__love">
    <div class="container">
        <div class="row bg-white">
            <div class="col-lg-12 col-md-12 col-sm-12 product__love-title">
                <h2 class="product__love-heading">
                    Có thể bạn thích
                </h2>
            </div>
        </div>
        <div class="row bg-white">
            <?php
                        $sql = "SELECT * FROM product where status = 1 and quantity > 0 order by sold asc limit 6";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) { 
                                if ($row['sale'] != 0) {?>
            <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">

                <div class="product__panel-img-wrap">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                </div>
                <h3 class="product__panel-heading">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link"><?php echo $row['pro_name']?></a>
                </h3>

                <?php showStar($row['pro_id']);?>

                <div class="product__panel-price-sale-off">
                    <?php echo $row['sale'],'%'?>
                </div>

                <div class="product__panel-price">
                    <span class="product__panel-price-old ">
                        <?php echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                    </span>
                </div>
            </div>
            <?php }
                                else { ?>
            <div class="product__panel-item col-lg-2 col-md-3 col-sm-6">

                <div class="product__panel-img-wrap">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>"><img src="image/<?php echo $row['image']?>" alt="" class="product__panel-img"></a>
                </div>
                <h3 class="product__panel-heading">
                    <a href="product.php?pro_id=<?php echo $row['pro_id']?>" class="product__panel-link"><?php echo $row['pro_name']?></a>
                </h3>

                <?php showStar($row['pro_id']);?>

                <div class="product__panel-price-sale-off">
                    <?php echo $row['sale'],'%'?>
                </div>

                <div class="product__panel-price">
                    <span class="product__panel-price-old product__panel-price-old-hide">
                        <?php echo formatCurrency( $row['price'])?>đ
                    </span>
                    <span class="product__panel-price-current">
                        <?php echo formatCurrency(($row['price'] - ($row['price'] * $row['sale'] / 100 )))?>đ
                    </span>
                </div>
            </div>
            <?php
                                }} 
                            } 
                                else {
                                    echo "0 results";
                                }
                            ?>

        </div>
    </div>
</section>

<!-- footer -->
<?php require_once 'footer.php'?>

<script src="js/main.js"></script>

</body>

<?php 
$conn->close();
?>