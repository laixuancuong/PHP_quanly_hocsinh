<?php require_once __DIR__. "/../layouts/header-hs.php";?>
<div class="main">
    <div class="wrap-main">
<?php require_once __DIR__. "/../layouts/menu-hs.php";?>
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
                                    if (isset($_POST['ud_hoso_hs'])){
                                            $sql_update = "UPDATE `hocsinh` SET matkhau = '".$_POST['matkhau']."' , ngaysinh = '".$_POST['ngaysinh']."', diachi = '".$_POST['diachi']."', sodt = '".$_POST['sodt']."', email = '".$_POST['email']."' WHERE  mahs =".$_SESSION['user_hs']; 
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
                        <a class="active" href="/qlhs/index.php">Trang chủ</a>
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
                                    <td><?php echo" ".$row['hoten_dem']." ".$row['ten_hs']." "?></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Mật khẩu:
                                    </td>
                                    <td><input type="text" name="matkhau" value="<?php echo $row['matkhau'] ?>"></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Lớp học:
                                    </td>
                                    <td><?php echo $row['tenlop'] ?> - <?php echo $row['namhoc'] ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Khoá học:
                                    </td>
                                    <td><?php echo $row['tenkhoahoc'] ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Ngày sinh:
                                    </td>
                                    <td><input type="date" min="2000/01/01" name="ngaysinh" value="<?php echo $row['ngaysinh'] ?>"></td>
                                </tr>
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
            <button class="btn-ct info" name="ud_hoso_hs">Cập nhật</button>
        </div>
        <!--end--list-main-->
        </form>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>