<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_cngv = mysqli_query($conn,"SELECT * FROM chucnang_gv cngv INNER JOIN giaovien gv ON gv.magv = cngv.magv INNER JOIN monhoc mh ON mh.mamh = cngv.mamh INNER JOIN khoi k ON k.makhoi = cngv.makhoi WHERE id_cn_gv =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa chức năng giáo viên
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /#page-wrapper -->
            <?php
                if (isset($_POST['upload-cngv'])){
                    $sql_update = "UPDATE `chucnang_gv` SET magv ='".$_POST['magv']."', mamh = '".$_POST['mamh']."' , makhoi = '".$_POST['makhoi']."' WHERE  id_cn_gv ='".$_GET['id']."'"; 
                    $conn->query($sql_update);
                    echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                    <?php
                        while ($rows = mysqli_fetch_assoc($ud_cngv))
                        {
                    ?>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Họ tên</label>
                            </div>
                            <div class="col-75">
                                <select name="magv" class="tmn" id="add_">
                                    <option value="<?php echo $rows['magv']; ?>"><?php echo" ".$rows['hoten_dem']." ".$rows['ten_gv'].""; ?></option>
                                    <?php 
                                        foreach($giaovien as $row ){
                                            echo "
                                                <option value=".$row['magv'].">".$row['hoten_dem']." ".$row['ten_gv']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Môn giảng dạy</label>
                            </div>
                            <div class="col-75">
                                <select name="mamh" class="tmn" id="add_">
                                    <option value="<?php echo $rows['mamh']; ?>"><?php echo" ".$rows['tenmh'].""; ?></option>
                                    <?php 
                                        foreach($monhoc as $row ){
                                            echo "
                                                <option value=".$row['mamh'].">".$row['tenmh']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Khối</label>
                            </div>
                            <div class="col-75">
                                <select name="makhoi" class="tmn" id="add_">
                                    <option value="<?php echo $rows['makhoi']; ?>"><?php echo $rows['tenkhoi']; ?></option>
                                    <?php 
                                        foreach($khoi as $row ){
                                            echo "
                                                <option value=".$row['makhoi'].">".$row['tenkhoi']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="upload-cngv" value="Cập nhật" class="upload">
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