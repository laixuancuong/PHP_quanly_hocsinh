<?php require_once __DIR__. "/../../layouts/header.php";?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới phân công giảng dạy
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="POST">
                    <table style="width: 100%; margin-bottom: 20px;">
                        <tbody>
                            <tr>
                                <td>
                                    <table style="width: 100%;">
                                        <tbody>
                                            <tr style="float: left;">
                                                <td><span style="margin-right: 10px">  Khối: </span></td>
                                                <td>
                                                    <select name="makhoi" class="subject-select" style="width:150px;">
                                                            <option value="">--chọn--</option>
                                                            <?php 
                                                                    foreach($khoi as $row ){
                                                                         echo "
                                                                        <option value=".$row['makhoi'].">".$row['tenkhoi']."</option>
                                                                        ";
                                                                    }
                                                            ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr style="float: left;">
                                                <td><span style="margin-right: 10px">  Môn: </span></td>
                                                <td>
                                                    <select name="mamh" class="subject-select" style="width:150px;">
                                                            <option value="">--chọn--</option>
                                                            <?php 
                                                                    foreach($monhoc as $row ){
                                                                         echo "
                                                                        <option value=".$row['mamh'].">".$row['tenmh']."</option>
                                                                        ";
                                                                    }
                                                            ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr style="float: right; padding-top: 5px;">
                                                <td >
                                                    <button class="btn btn-success" type="submit" name="search" value="search"><i class="fa fa-search"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
                <!-- /.col-lg-12 -->
                <?php 
                if(isset($_POST['search'])){
                    $makhoi = $_POST["makhoi"];
                    $mamh = $_POST["mamh"];
                    $sql = "SELECT * FROM lop l INNER JOIN khoi k ON k.makhoi = l.makhoi INNER JOIN phancong_cn pccn ON pccn.malh = l.malh WHERE k.makhoi = ".$makhoi." AND pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) ORDER BY tenlop";
                    $loph = $conn->query($sql);
                    $sql = 'SELECT * FROM chucnang_gv cngv INNER JOIN giaovien gv ON gv.magv = cngv.magv INNER JOIN monhoc mh ON mh.mamh = cngv.mamh INNER JOIN khoi k ON k.makhoi = cngv.makhoi WHERE k.makhoi = '.$makhoi.' AND mh.mamh = '.$mamh.' ORDER BY cngv.id_cn_gv DESC';
                    $dl_cngv = $conn->query($sql);
                    $sql = "SELECT * FROM namhoc WHERE id_namhoc = (SELECT MAX(id_namhoc) FROM namhoc)";
                    $namhoc_max = $conn->query($sql);
                }else{
                    $sql = "SELECT * FROM lop l INNER JOIN khoi k ON k.makhoi = l.makhoi INNER JOIN phancong_cn pccn ON pccn.malh = l.malh WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) ORDER BY tenlop";
                    $loph = $conn->query($sql);
                    $sql = "SELECT * FROM namhoc WHERE id_namhoc = (SELECT MAX(id_namhoc) FROM namhoc)";
                    $namhoc_max = $conn->query($sql);
                }
                ?>
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Giáo viên</label>
                            </div>
                            <div class="col-75">
                                <select name="id_cn_gv" class="tmn" id="add_">
                                    <option value="">--chọn--</option>
                                    <?php 
                                        foreach($dl_cngv as $row ){
                                            echo "
                                                <option value=".$row['id_cn_gv'].">".$row['hoten_dem']." ".$row['ten_gv']." - Môn: ".$row['tenmh']." - Khối: ".$row['tenkhoi']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Lớp học</label>
                            </div>
                            <div class="col-75">
                                <select name="id_pc_cn" class="tmn" id="add_">
                                    <option value="">--chọn--</option>
                                    <?php 
                                        foreach($loph as $row ){
                                            echo "
                                                <option value=".$row['id_pc_cn'].">".$row['tenlop']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Năm học</label>
                            </div>
                            <div class="col-75">
                                <select name="id_namhoc" class="tmn" id="add_">
                                    <?php 
                                        foreach($namhoc_max as $row ){
                                            echo "
                                                <option value=".$row['id_namhoc'].">".$row['namhoc']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-pcgd" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>