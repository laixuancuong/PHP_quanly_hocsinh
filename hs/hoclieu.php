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
                                    <h4>Học liệu</h4>
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
                                    <th class="center-header" scope="col" >Môn học</th>
                                    <th class="center-header" scope="col" >Lớp học</th>
                                    <th class="center-header" scope="col" >Nội dung</th>
                                    <th class="center-header" scope="col" >Năm học</th>
                                    <th class="center-header" scope="col" >Thao tác</th>
                                </tr>
                                <tr>
                                    <?php
                                        $stt = 1;
                                        if(isset($_POST['search-lop'])){
                                            $id_namhoc = $_POST["id_namhoc"];
                                            $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN hoclieu hl ON hl.mapc = pc.mapc INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn
                                            WHERE pc.id_namhoc = ".$id_namhoc." AND pccn.id_namhoc = pc.id_namhoc AND  pclh.mahs = ".$_SESSION['user_hs']."
                                                ";
                                            $dl = $conn->query($sql);
                                            foreach($dl as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['tenmh']."</td>
                                                            <td align='center'>".$row['tenlop']."</td>
                                                            <td align='center'>".$row['noidung']."</td>
                                                            <td align='center'>".$row['namhoc']."</td>
                                                            <td align='center' style='width: 12%'>
                                                                <a align='center' href='download.php?file_kem=".$row['file_kem']."'><i class='fa fa-download' aria-hidden='true'></i> Tải</a>
                                                            </td>
                                                        ";
                                                        $stt ++;
                                                    }
                                        }else{
                                            foreach($dl_hoclieu as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['tenmh']."</td>
                                                            <td align='center'>".$row['tenlop']."</td>
                                                            <td align='center'>".$row['noidung']."</td>
                                                            <td align='center'>".$row['namhoc']."</td>
                                                            <td align='center' style='width: 12%'>
                                                                <a align='center' href='download.php?file_kem=".$row['file_kem']."'><i class='fa fa-download' aria-hidden='true'></i> Tải</a>
                                                            </td>
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