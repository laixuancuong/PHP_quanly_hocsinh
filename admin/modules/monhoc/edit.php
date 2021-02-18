<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_monhoc = mysqli_query($conn,"SELECT * FROM monhoc mh where mamh =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa môn học
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /#page-wrapper -->
            <?php
                if (isset($_POST['update-mh'])){
                    $sql_update = "UPDATE `monhoc` SET tenmh ='".$_POST['tenmh']."' WHERE mamh ='".$_GET['id']."'"; 
                    $conn->query($sql_update);
                    echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên môn học</label>
                            </div>
                            <div class="col-75">
                                <?php
                                    while ($row = mysqli_fetch_assoc($ud_monhoc))
                                    {
                                ?>
                                <input type="text" id="" name='tenmh' value="<?php echo $row['tenmh']; ?>" placeholder="Tên môn học">
                                <?php
                                    }
                                ?>
                            </div>     
                        </div>
                        <div class="row input-sm row-login">
                                <input type="submit" name="update-mh" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                        </div> 
                    </form>
                </div>
            </div>
        </div>
<?php require_once __DIR__. "/../../layouts/footer.php";?>