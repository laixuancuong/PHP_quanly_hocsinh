<?php require_once __DIR__. "/../layouts/header-gv.php";?>
<div class="main">
    <div class="wrap-main">
<?php require_once __DIR__. "/../layouts/menu-gv.php";?>
        <!--end-menu-main-->
        <div class="list-main">
            <div class="list-row">
                <div class="panel-header" style="background: white; border-bottom: 1px solid #dddddd">
                    <table style="width: 100%">
                    <form action="" method="POST">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Quản lý lớp học chủ nhiệm</h4>
                                </td>
                                <td style="float: right">
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
                                </td>
                            </tr>
                        </tbody>
                    </form>
                    </table>
                </div>
                <!--end-panel-header-->
                <?php 
                    $stt = 1;
                        if(isset($_POST['search-lop'])){
                            $id_namhoc = $_POST["id_namhoc"];
                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs
                                            WHERE pccn.id_namhoc = ".$id_namhoc." AND  pccn.magv = ".$_SESSION['user_gv']." ORDER BY pclh.id_pc_lh DESC
                                                ";
                            $dl = $conn->query($sql);
                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh 
                                            WHERE pccn.id_namhoc = ".$id_namhoc." AND  pccn.magv = ".$_SESSION['user_gv']."
                                                ";
                            $lop_cn = $conn->query($sql);
                        }else{
                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs
                                            WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND  pccn.magv = ".$_SESSION['user_gv']." ORDER BY pclh.id_pc_lh DESC
                                                ";
                            $dl = $conn->query($sql);
                            $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh 
                                            WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND  pccn.magv = ".$_SESSION['user_gv']."
                                                ";
                            $lop_cn = $conn->query($sql);
                        }
                 ?>
                <form action="/qlhs/libs/function.php" method="POST">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <tr>
                                    <td><span>Lớp: </span></td>
                                    <td>
                                        <select name="id_pc_cn" id="">
                                            <?php 
                                                    foreach($lop_cn as $row ){
                                                         echo "
                                                        <option value=".$row['id_pc_cn'].">".$row['tenlop']."</option>
                                                        ";
                                                    }
                                            ?>
                                         </select>
                                    </td>
                                    <td><span>Học sinh: </span></td>
                                    <td>
                                        <select name="mahs" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($dl_hocsinh as $row ){
                                                         echo "
                                                        <option value=".$row['mahs'].">".$row['hoten_dem']." ".$row['ten_hs']." - Khoá: ".$row['tenkhoahoc']."</option>
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
                    <button class="btn-ct success" name="add-gv_lop">Thêm</button>
                </div>
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
                            <tbody>
                                <tr>
                                    <th class="center-header" scope="col" style="width:1%;">STT</th>
                                    <th class="center-header" scope="col" >Họ tên</th>
                                    <th class="center-header" scope="col" >Mã học sinh</th>
                                    <th class="center-header" scope="col" >Lớp</th>
                                    <th class="center-header" scope="col" >Ngày sinh</th>
                                    <th class="center-header" scope="col" >Địa chỉ</th>
                                    <th class="center-header" scope="col" >Số điện thoại</th>
                                    <th class="center-header" scope="col" >Thao tác</th>
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
                                                            <td align='center'>".$row['ngaysinh']."</td>
                                                            <td align='center'>".$row['diachi']."</td>
                                                            <td align='center'>".$row['sodt']."</td>
                                                            <td align='center' style='width: 12%'>
                                                                <a class='btn btn-xs btn-danger' align='center' href='delete.php?id_pc_lh=".$row['id_pc_lh']."'> <i class='fa fa-times'></i> Xoá</a>
                                                            </td>
                                                        </tr>
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