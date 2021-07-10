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
                                    <h4>Lớp học</h4>
                                </td>
                                <td style="float: right">
                                <form action="" method="POST">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><span style="margin-right: 10px">Năm học: </span></td>
                                                <td>
                                                    <select name='id_namhoc' type='submit' class="subject-select" style="width:150px; margin-right: 10px; ">
                                                            <?php 
                                                                    foreach($namhoc as $row ){
                                                                         echo "
                                                                        <option value=".$row['id_namhoc'].">".$row['namhoc']."</option>
                                                                        ";
                                                                    }
                                                            ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <span style="margin-right: 10px;"><button style=" height: 30px;" class="btn-ct info" name="search-lop"><i class="fa fa-search"></i></button></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end-panel-header-->
                <?php 
                    $stt = 1;
                                        if(isset($_POST['search-lop'])){
                                            $id_namhoc = $_POST["id_namhoc"];
                                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs INNER JOIN namhoc nh ON nh.id_namhoc = pccn.id_namhoc
                                            WHERE pccn.id_namhoc = ".$id_namhoc." AND l.malh = (SELECT pccn.malh FROM phancong_lh pclh INNER JOIN phancong_cn pccn ON pclh.id_pc_cn = pccn.id_pc_cn WHERE pccn.id_namhoc = ".$id_namhoc." AND pclh.mahs = ".$_SESSION['user_hs'].")
                                                ";
                                            $dl = $conn->query($sql);
                                            $sql1 = "SELECT * FROM phancong_cn pccn INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN giaovien gv ON gv.magv = pccn.magv
                                                WHERE pclh.mahs = ".$_SESSION['user_hs']." AND pccn.id_namhoc = ".$id_namhoc." ";
                                            $gv_cn = $conn->query($sql1);
                                        }else{
                                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs INNER JOIN namhoc nh ON nh.id_namhoc = pccn.id_namhoc
                                            WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND l.malh = (SELECT pccn.malh FROM phancong_lh pclh INNER JOIN phancong_cn pccn ON pclh.id_pc_cn = pccn.id_pc_cn WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND pclh.mahs = ".$_SESSION['user_hs'].")
                                                ";
                                            $dl = $conn->query($sql);
                                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN giaovien gv ON gv.magv = pccn.magv
                                                WHERE pclh.mahs = ".$_SESSION['user_hs']." AND pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) ";
                                            $gv_cn = $conn->query($sql);
                                        }
                 ?>
                <form action="/qlhs/hs/thongtin.php" method="POST">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <tr>
                                    <td><span style="margin-right: 10px">Chủ nhiệm: </span></td>
                                    <td>
                                        <select name='magv' type='submit' class="subject-select" style="width:150px; margin-right: 10px; ">
                                                <?php 
                                                        foreach($gv_cn as $rows ){
                                                            echo "
                                                            <option value=".$rows['magv'].">".$rows['hoten_dem']." ".$rows['ten_gv']."</option>
                                                            ";
                                                        }
                                                ?>
                                        </select>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                </div>
                <!--end-list-row-->
                <div class="btn-control">
                    <button class="btn-ct success" name="thongtin">Xem thông tin</button>
                </div>
            </form>
            <div class="list-row">
                    <div class="topnav">
                        <a class="active" href="../index.php">Trang chủ</a>
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
                                    <th class="center-header" scope="col" >Học sinh</th>
                                    <th class="center-header" scope="col" >Mã sinh viên</th>
                                    <th class="center-header" scope="col" >Lớp</th>
                                    <th class="center-header" scope="col" >Năm học</th>
                                </tr>
                                <tr>
                                    <?php
                                        
                                            foreach($dl as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                            <td align='center'>".$row['mahs']."</td>
                                                            <td align='center'>".$row['tenlop']."</td>
                                                            <td align='center'>".$row['namhoc']."</td>
                                                        ";
                                                        $stt ++;
                                                    }
                                        
                                        if ($stt<=1) {
                                            echo "<tr class='odd gradeX' id='hienthi'>Không có dữ liệu</td>";
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                
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