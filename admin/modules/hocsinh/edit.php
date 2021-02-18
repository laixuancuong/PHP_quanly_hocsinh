<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_hs = mysqli_query($conn,"SELECT * FROM hocsinh hs INNER JOIN khoahoc kh ON hs.id_khoahoc = kh.id_khoahoc INNER JOIN namhoc nh ON nh.id_namhoc = kh.id_namhoc  WHERE mahs =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa học sinh
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /#page-wrapper -->
            <?php
                if (isset($_POST['upload-hs'])){
                    $sql_update = "UPDATE `hocsinh` SET hoten_dem ='".$_POST['hoten_dem']."', ten_hs = '".$_POST['ten_hs']."' , matkhau = '".$_POST['matkhau']."' , diachi = '".$_POST['diachi']."', ngaysinh = '".$_POST['ngaysinh']."', id_khoahoc
                     = '".$_POST['id_khoahoc']."', sodt = '".$_POST['sodt']."', email = '".$_POST['email']."', gioitinh = '".$_POST['gioitinh']."' WHERE  mahs ='".$_GET['id']."'"; 
                    $conn->query($sql_update);
                    echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                        <?php
                            while ($row = mysqli_fetch_assoc($ud_hs))
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
                                <label class="label-login" for="fname">Tên học sinh</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='ten_hs' value="<?php echo $row['ten_hs']; ?>" placeholder="Tên học sinh">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Mật khẩu</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='matkhau' value="<?php echo $row['matkhau']; ?>" placeholder="Mật khẩu">
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
                            <p style="width: 250px; float: left; padding-right: 20px;" ><b>Ngày sinh </b><input type="date" min="2000-01-01" style="width: 220px;" name="ngaysinh" value="<?php echo $row['ngaysinh']; ?>" size="5" class="gia" id="add_"></p>
                            
                            <p style="width: 200px; float: left; padding-right: 20px;" ><b>Khoá:</b>
                                <select name="id_khoahoc" class="tmn" id="add_">
                                    <option value="<?php echo $row['id_khoahoc']; ?>"><?php echo $row['tenkhoahoc']; ?></option>
                                    <?php 
                                        foreach($khoahoc as $row ){
                                            echo "
                                                <option value=".$row['id_khoahoc'].">".$row['tenkhoahoc']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </p>
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
                                <input type="submit" name="upload-hs" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php";?>