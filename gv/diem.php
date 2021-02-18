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
                                    <h4>Quản lý điểm chi tiết</h4>
                                </td>
                                <td style="float: right">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <a href="diemtongket.php">
                                                    <span style="margin-right: 10px;"><button style=" height: 30px;" class="btn-ct info" name="search-lop">Điểm tổng kết</button></span>
                                                </a>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                <tr>
                                    <td><span>Học kỳ: </span></td>
                                    <td>
                                        <select name="malop" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($kyhoc as $row ){
                                                        echo "
                                                        <option value=".$row['id_kyhoc'].">".$row['tenky']."</option>
                                                                        ";
                                                    }
                                            ?>
                                         </select>
                                    </td>
                                    <td><span>Tên lớp: </span></td>
                                    <td>
                                        <select name="malop" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($gv_lop as $row ){
                                                         echo "
                                                        <option value=".$row['malh'].">".$row['tenlop']."</option>
                                                        ";
                                                    }
                                            ?>
                                         </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                </div>
                <!--end-list-row-->
                <div class="btn-control">
                    <button class="btn-ct success" name="search-diem" >Tìm</button>
                </div>
            </form>
            <div class="list-row">
                    <div class="topnav">
                        <a class="active" href="/qlhs_ht/gv/index.php">Trang chủ</a>
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
                            <tbody>
                                <tr>
                                    <th class="center-header" scope="col" style="width:1%;">STT</th>
                                    <th class="center-header" scope="col" >Họ tên</th>
                                    <th class="center-header" scope="col" >Lớp</th>
                                    <th class="center-header" scope="col" >Môn</th>
                                    <th class="center-header" scope="col" >Điểm miệng 1</th>
                                    <th class="center-header" scope="col" >Điểm miệng 2</th>
                                    <th class="center-header" scope="col" >Điểm 15p 1</th>
                                    <th class="center-header" scope="col" >Điểm 15p 2</th>
                                    <th class="center-header" scope="col" >Điểm gk</th>
                                    <th class="center-header" scope="col" >Điểm gk</th>
                                </tr>
                                <tr>
                                        <?php
                                        $stt = 1;
                                        if(isset($_POST['search-diem'])){
                                            $id_namhoc = $_POST["id_namhoc"];
                                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs
                                            WHERE pccn.id_namhoc = ".$id_namhoc." AND  pccn.magv = ".$_SESSION['user_gv']."
                                                ";
                                            $dl = $conn->query($sql);
                                            foreach($dl as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                            <td align='center'><input type='text' name='diemm1' value='<?php echo" .$row['diemm1']." ?>'></td>
                                                            <td align='center'></td>
                                                            <td align='center'>".$row['diachi']."</td>
                                                            <td align='center'>".$row['sodt']."</td>
                                                        </tr>
                                                        ";
                                                        $stt ++;
                                                    }
                                        }else{
                                            foreach($dl_diem as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                            <td align='center'><input type='text' name='diemm1' value='<?php echo" .$row['diemm1']." ?>'></td>
                                                            <td align='center'></td>
                                                            <td align='center'>".$row['diachi']."</td>
                                                            <td align='center'>".$row['sodt']."</td>
                                                        </tr>
                                                        ";
                                                        $stt ++;
                                                    }
                                        }
                                        if ($stt<=1) {
                                            echo "<tr class='odd gradeX' id='hienthi'>Không có dữ liệu</td>";
                                        }
                                    ?>
                                </tr>
                            </tbody>
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