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
                                    <h4>Điểm tổng kết môn</h4>
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
                                                    <span style="margin-right: 10px;"><button style=" height: 30px;" class="btn-ct info" name="search"><i class="fa fa-search"></i></button></span>
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
                    if(isset($_POST['search'])){
                        $id_namhoc = $_POST["id_namhoc"];
                        $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh
                                            WHERE pc.id_namhoc = ".$id_namhoc." AND  cngv.magv = ".$_SESSION['user_gv']." ";
                        $dl = $conn->query($sql);
                        $sql = "SELECT * FROM namhoc nh INNER JOIN kyhoc kh ON kh.id_namhoc = nh.id_namhoc
                                            WHERE nh.id_namhoc = ".$id_namhoc." ";
                        $hk = $conn->query($sql);

                    }else{
                        $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh
                                            WHERE pc.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong) AND  cngv.magv = ".$_SESSION['user_gv']." ";
                        $dl = $conn->query($sql);
                        $sql = "SELECT * FROM namhoc nh INNER JOIN kyhoc kh ON kh.id_namhoc = nh.id_namhoc
                                            WHERE nh.id_namhoc = (SELECT MAX(id_namhoc) FROM namhoc) ";
                        $hk = $conn->query($sql);
                    }
                 ?>
                <form action="" method="POST">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <tr>
                                        <td><span>Tên lớp: </span></td>
                                        <td>
                                            <select name="id_pc_cn" id="">
                                                <?php 
                                                        foreach($dl as $row ){
                                                             echo "
                                                            <option value=".$row['id_pc_cn'].">".$row['tenlop']."</option>
                                                            ";
                                                        }
                                                ?>
                                             </select>
                                        </td>
                                        <td><span>Tên môn: </span></td>
                                        <td>
                                            <select name="mamh" id="">
                                                <?php 
                                                        foreach($dl as $row ){
                                                             echo "
                                                            <option value=".$row['mamh'].">".$row['tenmh']."</option>
                                                            ";
                                                        }
                                                ?>
                                             </select>
                                        </td>
                                        <td><span>Năm học: </span></td>
                                        <td>
                                                <select name="id_namhoc" id="">
                                                    <?php 
                                                            foreach($dl as $row ){
                                                                echo "
                                                                <option value=".$row['id_namhoc'].">".$row['namhoc']."</option>
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
                    <button class="btn btn-primary" name="search_diem">Tìm</button>
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
                <?php 
                    $stt = 1;
                    if(isset($_POST['search_diem']) ){
                                $id_namhoc = $_POST["id_namhoc"];
                                $mamh = $_POST["mamh"];
                                $id_pc_cn = $_POST["id_pc_cn"];
                                $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh
                                                                        WHERE mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn." AND  cngv.magv = ".$_SESSION['user_gv']." ";
                                $dl2 = $conn->query($sql);
                                $sql = "SELECT * FROM namhoc WHERE id_namhoc = ".$id_namhoc." ";
                                $nh2 = $conn->query($sql);
                ?>
                <form action="" method="POST">
                    <div class="panel-body">
                            <table cellpadding="10">
                                <tbody>
                                    <tr>
                                        <td><span>Tên lớp: </span></td>
                                        <td>
                                            <select name="id_pc_cn" id="">
                                                <?php 
                                                        foreach($dl2 as $row ){
                                                             echo "
                                                            <option value=".$row['id_pc_cn'].">".$row['tenlop']."</option>
                                                            ";
                                                        }
                                                ?>
                                             </select>
                                        </td>
                                        <td><span>Tên môn: </span></td>
                                        <td>
                                            <select name="mamh" id="">
                                                <?php 
                                                        foreach($dl2 as $row ){
                                                             echo "
                                                            <option value=".$row['mamh'].">".$row['tenmh']."</option>
                                                            ";
                                                        }
                                                ?>
                                             </select>
                                        </td>
                                        <td><span>Năm học: </span></td>
                                        <td>
                                                <select name="id_namhoc" id="">
                                                    <?php 
                                                            foreach($nh2 as $row ){
                                                                echo "
                                                                <option value=".$row['id_namhoc'].">".$row['namhoc']."</option>
                                                                                ";
                                                            }
                                                    ?>
                                                 </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" cellspacing="0" cellpadding="5" rules="all" border="1">
                            <tbody>
                                <tr>
                                    <th class="center-header" scope="col" >STT</th>
                                    <th class="center-header" scope="col" >Họ tên</th>
                                    <th class="center-header" scope="col" >Mã học sinh</th>
                                    <th class="center-header" scope="col" >Lớp</th>
                                    <th class="center-header" scope="col" >Môn</th>
                                    <th class="center-header" scope="col" >Điểm học kỳ 1</th>
                                    <th class="center-header" scope="col" >Điểm học kỳ 2</th>
                                    <th class="center-header" scope="col" >Điểm tổng kết môn</th>
                                    <th class="center-header" scope="col" >Năm học</th>
                                </tr>
                                <tr>
                            <?php
                                    $sql = "SELECT * FROM diem_tk dtk INNER JOIN hocsinh hs ON dtk.mahs = hs.mahs INNER JOIN monhoc mh ON dtk.mamh = mh.mamh INNER JOIN namhoc nh ON dtk.id_namhoc = nh.id_namhoc INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON l.malh = pccn.malh
                                            WHERE nh.id_namhoc = ".$id_namhoc." AND mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn."
                                                ";
                                    $dl_diem = $conn->query($sql);
                                    $num_rows = mysqli_num_rows($dl_diem);
                                    if ($num_rows>=1) {
                                        foreach($dl_diem as $key => $row){
                                            echo "
                                                <tr class='odd gradeX' id='hienthi'>
                                                    <td align='center'>
                                                                    ".$stt."
                                                                </td>
                                                    <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                    <td align='center'>".$row['mahs']."</td>
                                                    <td align='center'>".$row['tenlop']."</td>
                                                    <td align='center'>".$row['tenmh']."</td>
                                                    <td align='center'>".$row['diemhk1']."</td>
                                                    <td align='center'>".$row['diemhk2']."</td>
                                                    <td align='center'>".$row['diemtkm']."</td>
                                                    <td align='center'>".$row['namhoc']."</td>
                                                </tr>
                                                                ";
                                                $stt ++;
                                        }
                                    }else{
                                        echo "<tr class='odd gradeX' id='hienthi'>Không có dữ liệu</td>";
                                    }
                                }
                            ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
            </div>
            <!--end--list-row-->
            <div class="btn-control">
                <button class="btn btn-primary" name="chotdiem">Chốt điểm</button>
            </div>
        </div>
        <!--end--list-main-->
        </form>
    </div>
    <!--end--warp-main-->
    <?php 
        if(isset($_POST['chotdiem'])){
                $id_namhoc = $_POST["id_namhoc"];
                $mamh = $_POST["mamh"];
                $id_pc_cn = $_POST["id_pc_cn"];
                    $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh INNER JOIN diem_tk dtk ON dtk.mahs = hs.mahs INNER JOIN monhoc mh ON mh.mamh = dtk.mamh
                                                WHERE mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn." AND dtk.id_namhoc = ".$id_namhoc." ";
                    $dtk = mysqli_query($conn,$sql);
                            foreach($dtk as $key => $row){ 
                                $id_diem_tkm= $row["id_diem_tkm"];
                                $diemhk1[] = $row["diemhk1"];
                                $diemhk2[] = $row["diemhk2"];
                                $diemtk[] = round((($diemhk1["$key"] + ($diemhk2["$key"]*2)) / 3),1);
                                $update ="UPDATE `diem_tk` SET `diemtkm` = '".$diemtk["$key"]."' WHERE `diem_tk`.`id_diem_tkm` = '".$id_diem_tkm."'";
                                $conn->query($update);
                            }
            }
     ?>
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>