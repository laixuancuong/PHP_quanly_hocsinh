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
                                    <h4>Quản lý điểm chi tiết</h4>
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
                                            <option value="">--chọn--</option>
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
                                    <td><span>Học kỳ: </span></td>
                                    <td>
                                            <select name="id_kyhoc" id="">
                                                <?php 
                                                        foreach($hk as $row ){
                                                            echo "
                                                            <option value=".$row['id_kyhoc'].">".$row['tenky']."-".$row['namhoc']."</option>
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
                        <button class="btn-ct success" name="search-diem">Tìm</button> 
                        <a class='btn-ct info' align='center' href='diemtongket.php'>Điểm tổng kết</a>
                         
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
                    if(isset($_POST['search-diem']) ){
                        if (!isset($_POST["id_pc_cn"])) {
                            echo '
                                    <tr class="odd gradeX" style="color:red; margin: 2%;" id="hienthi"> Không có dữ liệu</tr>
                                    ';
                        }else{
                            if ($_POST["id_pc_cn"] == '' || $_POST["id_kyhoc"] == '' || $_POST["mamh"] == '') {
                                echo '
                                        <tr class="odd gradeX" style="color:red; margin: 2%;" id="hienthi"> Chưa chọn dữ liệu</tr>
                                        ';
                            }else{
                                $id_kyhoc = $_POST["id_kyhoc"];
                                $mamh = $_POST["mamh"];
                                $id_pc_cn = $_POST["id_pc_cn"];
                                $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh
                                                                        WHERE mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn." AND  cngv.magv = ".$_SESSION['user_gv']." ";
                                $dl2 = $conn->query($sql);
                                $sql = "SELECT * FROM namhoc nh INNER JOIN kyhoc kh ON kh.id_namhoc = nh.id_namhoc WHERE kh.id_kyhoc = ".$id_kyhoc." ";
                                $hk2 = $conn->query($sql);
                        
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
                                        <td><span>Học kỳ: </span></td>
                                        <td>
                                                <select name="id_kyhoc" id="">
                                                    <?php 
                                                            foreach($hk2 as $row ){
                                                                echo "
                                                                <option value=".$row['id_kyhoc'].">".$row['tenky']."-".$row['namhoc']."</option>
                                                                                ";
                                                            }
                                                    ?>
                                                 </select>
                                        </td>
                                        <td><span>Năm học: </span></td>
                                        <td>
                                                <select name="id_namhoc" id="">
                                                    <?php 
                                                            foreach($hk2 as $row ){
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
                                    <th class="center-header" scope="col" style="width:1%;">STT</th>
                                    <th class="center-header" scope="col" >Họ tên</th>
                                    <th class="center-header" scope="col" >Mã học sinh</th>
                                    <th class="center-header" scope="col" >Điểm thường xuyên 1</th>
                                    <th class="center-header" scope="col" >Điểm thường xuyên 2</th>
                                    <th class="center-header" scope="col" >Điểm giữa kỳ</th>
                                    <th class="center-header" scope="col" >Điểm cuối kỳ</th>
                                </tr>
                                <tr>
                            <?php
                                $sql = "SELECT * FROM diem_chitiet dct INNER JOIN hocsinh hs ON dct.mahs = hs.mahs INNER JOIN monhoc mh ON dct.mamh = mh.mamh INNER JOIN kyhoc kh ON dct.id_kyhoc = kh.id_kyhoc INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn
                                            WHERE kh.id_kyhoc = ".$id_kyhoc." AND mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn."
                                                ";
                                $dl_diem = $conn->query($sql);
                                $num_rows = mysqli_num_rows($dl_diem);
                                $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh
                                            WHERE pccn.id_pc_cn = ".$id_pc_cn."  ";
                                $lh = mysqli_query($conn,$sql);
                                if ($num_rows==0) {
                                    foreach($lh as $row){
                                        echo "
                                            <tr class='odd gradeX' id='hienthi'>
                                                <td align='center'>
                                                                ".$stt."
                                                </td>
                                                <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                 <td align='center'>".$row['mahs']."</td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemtx1".$stt."' value='' step='0.25'min='0' max='10' ></td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemtx2".$stt."' value='' step='0.25'min='0' max='10'></td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemgk".$stt."' value='' step='0.25'min='0' max='10'></td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemck".$stt."' value='' step='0.25'min='0' max='10'></td>
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
                                                 <td align='center'>".$row['mahs']."</td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemtx1".$stt."' value='".$row['diemtx1']."' step='0.25' min='0' max='10' ></td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemtx2".$stt."' value='".$row['diemtx2']."' step='0.25' min='0' max='10'></td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemgk".$stt."' value='".$row['diemgk']."' step='0.25' min='0' max='10'></td>
                                                <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemck".$stt."' value='".$row['diemck']."' step='0.25' min='0' max='10'></td>
                                            </tr>
                                                            ";
                                            $stt ++;
                                    }
                                }
                            }
                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
            </div>
            <!--end--list-row-->
            <?php 
                if ($num_rows==0) {
                    echo '
                    <div class="btn-control">
                        <button class="btn-ct warning" name="luudiem">Lưu</button>
                    </div>
                ';
                }else{
                    echo '
                    <div class="btn-control">
                        <button class="btn-ct info" name="cndiem">Cập nhật</button>
                        <button class="btn-ct success" name="chotdiem">Chốt điểm</button>
                    </div>
                    ';
                }
               }
            }
            ?>
            
        </div>
        <!--end--list-main-->
        </form>

        <?php 
            if(isset($_POST['cndiem'])){
                $id_kyhoc = $_POST["id_kyhoc"];
                $mamh = $_POST["mamh"];
                $id_pc_cn = $_POST["id_pc_cn"];
                $sql = "SELECT * FROM diem_chitiet dct INNER JOIN hocsinh hs ON dct.mahs = hs.mahs INNER JOIN monhoc mh ON dct.mamh = mh.mamh INNER JOIN kyhoc kh ON dct.id_kyhoc = kh.id_kyhoc INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn
                                            WHERE kh.id_kyhoc = ".$id_kyhoc." AND mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn."
                                                ";
                $query = mysqli_query($conn,$sql);
                $num_rows = mysqli_num_rows($query);
                if ($num_rows>=1) {
                    foreach($query as $key => $row){ 
                        $stt = $key+1;
                        $id_diem_ct= $row["id_diem_ct"];
                        $update ="UPDATE `diem_chitiet` SET `diemtx1` = '".$_POST["diemtx1$stt"]."', `diemtx2` = '".$_POST["diemtx2$stt"]."', `diemgk` = '".$_POST["diemgk$stt"]."', `diemck` = '".$_POST["diemck$stt"]."' WHERE id_diem_ct = '".$id_diem_ct."'";
                        $conn->query($update);
                    }
                    echo "Cập nhật điểm thành công";
                }
            }
            if(isset($_POST['luudiem'])){
                $id_kyhoc = $_POST["id_kyhoc"];
                $mamh = $_POST["mamh"];
                $id_pc_cn = $_POST["id_pc_cn"];
                $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh
                                                WHERE pccn.id_pc_cn = ".$id_pc_cn."  ";
                $query = mysqli_query($conn,$sql);
                $num_rows = mysqli_num_rows($query);
                if ($num_rows>=1) {
                    foreach($query as $key => $row){ 
                        $stt = $key+1;
                        $mahs= $row["mahs"];
                        $insert =mysqli_query($conn,"INSERT INTO `diem_chitiet` (`id_diem_ct`, `diemtx1`, `diemtx2`, `diemgk`, `diemck`, `mahs`, `mamh`, `id_kyhoc`) VALUES (NULL,'".$_POST["diemtx1$stt"]."','".$_POST["diemtx2$stt"]."','".$_POST["diemgk$stt"]."','".$_POST["diemck$stt"]."','".$mahs."','".$mamh."','".$id_kyhoc."')");
                        $stt ++;
                    }
                    echo "Lưu điểm thành công";
                }
            }
            if(isset($_POST['chotdiem'])){
                $id_kyhoc = $_POST["id_kyhoc"];
                $id_namhoc = $_POST["id_namhoc"];
                $mamh = $_POST["mamh"];
                $id_pc_cn = $_POST["id_pc_cn"];
                $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh
                                                WHERE pccn.id_pc_cn = ".$id_pc_cn."  ";
                $hs = mysqli_query($conn,$sql);
                $num_hs = mysqli_num_rows($hs);
                if ($num_hs>=1) {
                    $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh INNER JOIN diem_tk dtk ON dtk.mahs = hs.mahs INNER JOIN monhoc mh ON mh.mamh = dtk.mamh
                                                WHERE mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn."  ";
                    $dtk = mysqli_query($conn,$sql);
                    $num_tk = mysqli_num_rows($dtk);
                    if ($num_tk == 0) {
                        foreach($hs as $key => $row){ 
                            $stt = $key+1;
                            $mahs= $row["mahs"];
                            $diemhk1[] = round(((($_POST["diemtx1$stt"] + $_POST["diemtx2$stt"]) + $_POST["diemgk$stt"] * 2 + $_POST["diemck$stt"] * 3) / 7),1);
                            $insert =mysqli_query($conn,"INSERT INTO `diem_tk` (`id_diem_tkm`, `diemhk1`, `diemhk2`, `diemtkm`, `mahs`, `id_namhoc`, `mamh`) VALUES (NULL, '".$diemhk1["$key"]."', '0', '0', '".$mahs."', '".$id_namhoc."', '".$mamh."')");
                            $stt ++;
                        }
                        echo "Chốt điểm thành công";
                    }else{
                        $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh INNER JOIN diem_chitiet dct ON dct.mahs = hs.mahs INNER JOIN monhoc mh ON mh.mamh = dct.mamh INNER JOIN kyhoc kh ON kh.id_kyhoc = dct.id_kyhoc 
                                                WHERE mh.mamh = ".$mamh." AND pccn.id_pc_cn = ".$id_pc_cn." AND dct.id_kyhoc = ".$id_kyhoc."  ";
                        $dct = mysqli_query($conn,$sql);
                        foreach($dct as $key => $row){ 
                            $diemtx1[] = $row["diemtx1"];
                            $diemtx2[] = $row["diemtx2"];
                            $diemgk[] = $row["diemgk"];
                            $diemck[] = $row["diemck"];
                            $tenky = $row["tenky"];
                        }
                        if($tenky == 1){
                            foreach($dtk as $key => $row){ 
                                $id_diem_tkm= $row["id_diem_tkm"];
                                $diemhk1[] = round(((($diemtx1["$key"] + $diemtx2["$key"]) + $diemgk["$key"] * 2 + $diemck["$key"] * 3) / 7),1);
                                $update ="UPDATE `diem_tk` SET `diemhk1` = '".$diemhk1["$key"]."' WHERE `diem_tk`.`id_diem_tkm` = '".$id_diem_tkm."'";
                                $conn->query($update);
                            }
                            echo "Chốt điểm hk1 thành công";
                        }elseif ($tenky == 2) {
                            foreach($dtk as $key => $row){ 
                                $id_diem_tkm= $row["id_diem_tkm"];
                                $diemhk2[] = round(((($diemtx1["$key"] + $diemtx2["$key"]) + $diemgk["$key"] * 2 + $diemck["$key"] * 3) / 7),1);
                                $update ="UPDATE `diem_tk` SET `diemhk2` = '".$diemhk2["$key"]."' WHERE `diem_tk`.`id_diem_tkm` = '".$id_diem_tkm."'";
                                $conn->query($update);
                            }
                            echo "Chốt điểm hk2 thành công";
                        }
                    }
                }
            }
        ?>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>