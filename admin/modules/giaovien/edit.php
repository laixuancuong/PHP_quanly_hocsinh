<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_gv = mysqli_query($conn,"SELECT * FROM giaovien  WHERE magv =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa giáo viên
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
                if (isset($_POST['upload-gv'])){
                        $sql_update = "UPDATE `giaovien` SET hoten_dem ='".$_POST['hoten_dem']."', ten_gv = '".$_POST['ten_gv']."' , password = '".$_POST['password']."' , diachi = '".$_POST['diachi']."', sodt = '".$_POST['sodt']."', email = '".$_POST['email']."', gioitinh = '".$_POST['gioitinh']."' WHERE  magv =".$id; 
                        $conn->query($sql_update);
                        echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                        <?php
                            while ($row = mysqli_fetch_assoc($ud_gv))
                            {
                        ?>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Họ tên đệm</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='hoten_dem' value="<?php echo $row['hoten_dem']; ?>" placeholder="Họ tên đệm">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='ten_gv' value="<?php echo $row['ten_gv']; ?>" placeholder="Tên">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Mật khẩu</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='password' value="<?php echo $row['password']; ?>" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Địa chỉ</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='diachi' value="<?php echo $row['diachi']; ?>" placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Số điện thoại</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='sodt' value="<?php echo $row['sodt']; ?>" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Email</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='email' value="<?php echo $row['email']; ?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div>
                                <p style="width: 300px; float: left; padding-right: 20px;" ><b>Giới tính:</b>
                                    <input type="radio" name="gioitinh" value="Nam"> Nam </input>
                                    <input type="radio" name="gioitinh" value="Nữ"> Nữ </input>
                                </p>
                            </div>
                        <?php
                            }
                        ?>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="upload-gv" value="Cập nhật" class="upload">
                                <input type="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php";?>