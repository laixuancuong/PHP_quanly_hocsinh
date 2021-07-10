<?php require_once __DIR__. "/../layouts/header-gv.php";?>
<div class="main">
    <div class="wrap-main">
<?php require_once __DIR__. "/../layouts/menu-gv.php";?>
        <!--end-menu-main-->
        <div class="list-main">
            <div class="list-row">
                <div class="panel-header" style="background: white; border-bottom: 1px solid #dddddd">
                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Trang hồ sơ cá nhân</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end-panel-header-->
                <form action="" method="POST">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <?php
                                    if (isset($_POST['ud_hoso_gv'])){
                                            $sql_update = "UPDATE `giaovien` SET password = '".$_POST['password']."' , diachi = '".$_POST['diachi']."', sodt = '".$_POST['sodt']."', email = '".$_POST['email']."' WHERE  magv =".$_SESSION['user_gv']; 
                                            $conn->query($sql_update);
                                            echo "<tr>Bạn đã cập nhật thành công! <a href='hoso.php'>Tải lại trang</a><tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                </div>
                <!--end-list-row-->
            </form>
            <div class="list-row">
                    <div class="topnav">
                        <a class="active" href="/qlhs/gv/index.php">Trang chủ</a>
                        <div class="search-container">
                            <form action="" method="POST">
                                <input type="text" placeholder="Search.." name="ten">
                                <button type="submit" name="search" value="search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!--end--topnav-->
                <form action="" method="POST">
                    <div class="panel-body">
                        <table class="table table-bordered" cellspacing="0" cellpadding="5" rules="all" border="1">
                            <?php foreach($hoso as $row ){ ?>
                            <tbody>
                                <!-- <tr align='center'><b>Thông tin cá nhân</b></tr> -->
                                <tr>
                                    <td width="15%">
                                        Họ và tên:
                                    </td>
                                    <td><?php echo" ".$row['hoten_dem']." ".$row['ten_gv']." "?></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Mật khẩu:
                                    </td>
                                    <td><input type="text" name="password" value="<?php echo $row['password'] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Chủ nhiệm lớp:
                                    </td>
                                    <td><?php echo $row['tenlop'] ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td width="15%">
                                        Môn giảng dạy:
                                    </td>
                                    <td><?php foreach($mon as $rows ){ ?>
                                        <?php echo" ".$rows['tenmh']." ".$rows['tenkhoi'].",  "?>
                                        <?php } ?></td>
                                </tr>
                                <?php foreach($hoso as $row ){ ?>
                                <tr>
                                    <td width="15%">
                                        Địa chỉ:
                                    </td>
                                    <td><input type="text" name="diachi" value="<?php echo $row['diachi'] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Số điện thoại:
                                    </td>
                                    <td><input type="text" name="sodt" value="<?php echo $row['sodt'] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Email:
                                    </td>
                                    <td><input type="text" name="email" value="<?php echo $row['email'] ?>"></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
            </div>
            <!--end--list-row-->
        </div>
        <div class="btn-control">
            <button class="btn-ct info" name="ud_hoso_gv">Cập nhật</button>
        </div>
        <!--end--list-main-->
        </form>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>