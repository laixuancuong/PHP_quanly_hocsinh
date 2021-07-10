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
                                                        <option value="">--chọn--</option>
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
                                    <td><span>Học kỳ: </span></td>
                                    <td>
                                            <select name="id_kyhoc" id="">
                                                <?php 
                                                        foreach($hk as $row ){
                                                            echo "
                                                            <option value=".$row['id_kyhoc'].">".$row['tenky']."</option>
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
                                <?php 
                                    $stt = 1;
                                        if(isset($_POST['search-diem'])){
                                            $id_kyhoc = $_POST["id_kyhoc"];
                                            $mamh = $_POST["mamh"];
                                            $id_pc_cn = $_POST["id_pc_cn"];
                                            $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh
                                            WHERE pccn.id_pc_cn = ".$id_pc_cn." AND  cngv.magv = ".$_SESSION['user_gv']." ";
                                            $dl2 = $conn->query($sql);
                                            $sql = "SELECT * FROM namhoc nh INNER JOIN kyhoc kh ON kh.id_namhoc = nh.id_namhoc WHERE kh.id_kyhoc = ".$id_kyhoc." ";
                                            $hk2 = $conn->query($sql);
                                 ?>
                                <tr>
                                            <tr>
                                                <td><span>Lớp: </span></td>
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
                                                <td><span>Kỳ: </span></td>
                                                <td>
                                                        <select name="id_kyhoc" id="">
                                                            <?php 
                                                                    foreach($hk2 as $row ){
                                                                        echo "
                                                                        <option value=".$row['id_kyhoc'].">".$row['tenky']."</option>
                                                                                        ";
                                                                    }
                                                            ?>
                                                         </select>
                                                </td>
                                            </tr>
                                </tr>
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
                                            $sql = "SELECT * FROM diem_chitiet dct INNER JOIN hocsinh hs ON dct.mahs = hs.mahs INNER JOIN monhoc mh ON dct.mamh = mh.mamh INNER JOIN kyhoc kh ON dct.id_kyhoc = kh.id_kyhoc
                                            WHERE kh.id_kyhoc = ".$id_kyhoc." AND mh.mamh = ".$mamh."
                                                ";
                                            $dl_diem = $conn->query($sql);
                                            $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh
                                            WHERE pccn.id_pc_cn = ".$id_pc_cn."  ";
                                            $lh = $conn->query($sql);
                                            foreach($lh as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                            <td align='center'>".$row['mahs']."</td>
                                                            <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemtx1".$stt."' value='' min='0' max='10' ></td>
                                                            <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemtx2".$stt."' value='' min='0' max='10'></td>
                                                            <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemgk".$stt."' value='' min='0' max='10'></td>
                                                            <td align='center'><input style ='text-align: center; color: red;' type='number' name='diemck".$stt."' value='' min='0' max='10'></td>
                                                            ";
                                                            $stt ++;
                                                        }
                                            /*foreach($dl_diem as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                            <td align='center'><input type='text' name='diemtx1' value='<?php echo" .$row['diemtx1']." ?>'></td>
                                                            <td align='center'><input type='text' name='diemtx2' value='<?php echo" .$row['diemtx2']." ?>'></td>
                                                            <td align='center'><input type='text' name='diemgk' value='<?php echo" .$row['diemgk']." ?>'></td>
                                                            <td align='center'><input type='text' name='diemck' value='<?php echo" .$row['diemck']." ?>'></td>
                                                        </tr>
                                                        ";
                                                        $stt ++;
                                                    }*/
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

            <div class="btn-control">
                <button class="btn-ct info" name="nhapdiem">Cập nhật</button>
                <button class="btn-ct success" name="deleteData">Chốt điểm</button>
            </div>
        </div>
        <!--end--list-main-->
        </form>

        <?php 
            if(isset($_POST['nhapdiem'])){
                $dk_query = mysqli_query($conn,"SELECT * FROM diem_chitiet");
                $dk_items  = mysqli_fetch_array($dk_query);
                $sql = "SELECT * FROM hocsinh hs INNER JOIN phancong_lh pclh ON pclh.mahs = hs.mahs INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh
                                                WHERE pccn.id_pc_cn = ".$_SESSION['id_pc_cn']."  ";
                $lh = $conn->query($sql);
                $num = mysql_num_rows($lh);
                if ($num >0) {
                    /*$insert =mysqli_query($conn,"INSERT INTO `diem_chitiet` (`id_diem_ct`, `mahs`, `id_pc_cn`) VALUES (NULL,'".$mahs."','".$id_pc_cn."')");*/
                    echo "ok";
                }
            }
        ?>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>