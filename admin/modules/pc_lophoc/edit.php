<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_pclh = mysqli_query($conn,"SELECT *  FROM phancong_lh pclh INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN giaovien gv ON gv.magv = pccn.magv INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs INNER JOIN namhoc nh ON pccn.id_namhoc = nh.id_namhoc INNER JOIN lop l ON pccn.malh = l.malh WHERE id_pc_lh =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa Phân công lớp học
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /#page-wrapper -->
            <?php
                if (isset($_POST['upload-pclh'])){
                    $sql_update = "UPDATE `phancong_lh` SET mahs ='".$_POST['mahs']."', id_pc_cn = '".$_POST['id_pc_cn']."' WHERE  id_pc_lh ='".$_GET['id']."'"; 
                    $conn->query($sql_update);
                    echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                    <?php
                        while ($rows = mysqli_fetch_assoc($ud_pclh))
                        {
                    ?>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Học sinh</label>
                            </div>
                            <div class="col-75">
                                <select name="mahs" class="tmn" id="add_">
                                    <option value="<?php echo $rows['mahs']; ?>"><?php echo" ".$rows['hoten_dem']." ".$rows['ten_hs'].""; ?></option>
                                    <?php 
                                        foreach($dl_hocsinh as $row ){
                                            echo "
                                                <option value=".$row['mahs'].">".$row['hoten_dem']." ".$row['ten_hs']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Lớp</label>
                            </div>
                            <div class="col-75">
                                <select name="id_pc_cn" class="tmn" id="add_">
                                    <option value="<?php echo $rows['id_pc_cn']; ?>"><?php echo" ".$rows['tenlop']." - Chủ nhiệm: ".$rows['ten_gv']." - Năm học: ".$rows['namhoc'].""; ?></option>
                                    <?php 
                                        foreach($dl_pccn as $rows ){
                                            echo "
                                                <option value=".$rows['id_pc_cn'].">".$rows['tenlop']." - Chủ nhiệm: ".$rows['ten_gv']." - Năm học: ".$rows['namhoc']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="upload-pclh" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                    <?php
                        }
                    ?>
                </div>
            </div>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php";?>