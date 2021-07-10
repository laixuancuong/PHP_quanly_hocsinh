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
                                    <h4>Trang thông tin liên hệ</h4>
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
                        <?php 
                            if(isset($_POST['thongtin'])){
                                $magv = $_POST["magv"];
                                $sql = "SELECT * FROM giaovien gv INNER JOIN phancong_cn pccn ON gv.magv = pccn.magv INNER JOIN lop l ON pccn.malh = l.malh
                                    WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND gv.magv = ".$magv."
                                        ";
                                $hoso_gv = $conn->query($sql);
                            }
                            elseif(isset($_GET['magv'])){
                                $magv = $_GET["magv"];
                                $sql = "SELECT * FROM giaovien gv INNER JOIN phancong_cn pccn ON gv.magv = pccn.magv INNER JOIN lop l ON pccn.malh = l.malh
                                    WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND gv.magv = ".$magv."
                                        ";
                                $hoso_gv = $conn->query($sql);
                            }
                            foreach($hoso_gv as $row ){ ?>
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
                                        Địa chỉ:
                                    </td>
                                    <td><?php echo $row['diachi'] ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Số điện thoại:
                                    </td>
                                    <td><?php echo $row['sodt'] ?></td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        Email:
                                    </td>
                                    <td><?php echo $row['email'] ?></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
            </div>
            <!--end--list-row-->
        </div>
        <!--end--list-main-->
        </form>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>