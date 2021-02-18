<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_pccn = mysqli_query($conn,"SELECT * FROM phancong_cn pccn INNER JOIN giaovien gv ON gv.magv = pccn.magv INNER JOIN lop lh ON lh.malh = pccn.malh INNER JOIN khoi k ON k.makhoi = lh.makhoi INNER JOIN namhoc nh ON pccn.id_namhoc = nh.id_namhoc WHERE id_pc_cn =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa phân công chủ nhiệm
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /#page-wrapper -->
            <?php
                if (isset($_POST['upload-pccn'])){
                    $sql_update = "UPDATE `phancong_cn` SET magv ='".$_POST['magv']."', malh = '".$_POST['malh']."' , id_namhoc = '".$_POST['id_namhoc']."' WHERE  id_pc_cn ='".$_GET['id']."'"; 
                    $conn->query($sql_update);
                    echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                    <?php
                        while ($rows = mysqli_fetch_assoc($ud_pccn))
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
                                <label class="label-login" for="fname">Lớp học</label>
                            </div>
                            <div class="col-75">
                                <select name="malh" class="tmn" id="add_">
                                    <option value="<?php echo $rows['malh']; ?>"><?php echo $rows['tenlop']; ?></option>
                                    <?php 
                                        foreach($lophoc as $row ){
                                            echo "
                                                <option value=".$row['malh'].">".$row['tenlop']."</option>
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
                                    <option value="<?php echo $rows['id_namhoc']; ?>"><?php echo $rows['namhoc']; ?></option>
                                    <?php 
                                        foreach($namhoc as $row ){
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
                                <input type="submit" name="upload-pccn" value="Cập nhật" class="upload">
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