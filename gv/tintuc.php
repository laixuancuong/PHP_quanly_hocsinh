<?php require_once __DIR__. "/../layouts/header-gv.php";?>
<div class="main">
        <div class="wrap-main">
            <div class="content-main">
                <div class="topnav">
                    <a class="active" href="/qlhs/gv/index.php">Trang chủ</a>
                    <a href="#about">Hướng dẫn</a>
                    <a href="#contact">Đóng góp ý kiến</a>
                </div>
                <!--end--topnav-->
                <?php 
                    $sql = "SELECT * FROM news WHERE id_news = '".$_GET['id']."'";
                    $dl_news = $conn->query($sql);
                    foreach($dl_news as $row){
                ?>
                <div class="row">
                    <div class="tintuc" style="padding: 4%;">
                        <p><?php echo" ".$row['noidung']." "?></p>
                    </div>
                </div>
                <!--end--row-->
                <?php } ?>
            </div>
            <!--end--content-main-->
            <?php require_once __DIR__. "/../layouts/news-gv.php";?>
            <!--end--news-main-->
        </div>
        <!--end--warp-main-->
    </div>
    <!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>