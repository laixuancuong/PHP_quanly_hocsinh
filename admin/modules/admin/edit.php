<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_ad = mysqli_query($conn,"SELECT * FROM account  WHERE id_account =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa admin
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
                if (isset($_POST['upload-ad'])){
                        $sql_update = "UPDATE `account` SET username ='".$_POST['username']."', hoten = '".$_POST['hoten']."' , password = '".$_POST['password']."' , dienthoai = '".$_POST['dienthoai']."' WHERE  id_account =".$id; 
                        $conn->query($sql_update);
                        echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                        <?php
                            while ($row = mysqli_fetch_assoc($ud_ad))
                            {
                        ?>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tài khoản</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='username' value="<?php echo $row['username']; ?>" placeholder="Tài khoản">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Họ tên</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='hoten' value="<?php echo $row['hoten']; ?>" placeholder="Tên">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Mật khẩu</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='password'value="<?php echo $row['password']; ?>" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Số điện thoại</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='dienthoai' value="<?php echo $row['dienthoai']; ?>" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="upload-ad" value="Cập nhật" class="upload">
                                <input type="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php";?>