<?php require_once __DIR__. "/../../layouts/header.php";?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới học sinh
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Họ tên đệm</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='hoten_dem' placeholder="Họ tên đệm">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên học sinh</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='ten_hs' placeholder="Tên học sinh">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Mật khẩu</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='matkhau' placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Địa chỉ</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='diachi' placeholder="Địa chỉ">
                            </div>
                        </div>
                        <div class="row row-login">
                            <p style="width: 250px; float: left; padding-right: 20px;" ><b>Ngày sinh </b><input type="date" min="2000-01-01" style="width: 220px;" name="ngaysinh" size="15" class="gia" id="add_"></p>
                            
                            <p style="width: 200px; float: left; padding-right: 20px;" ><b>Khoá:</b>
                                <select name="id_khoahoc" class="tmn" id="add_">
                                    <option value="">--chọn--</option>
                                    <?php 
                                        foreach($khoahoc as $row ){
                                            echo "
                                                <option value=".$row['id_khoahoc'].">".$row['tenkhoahoc']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </p>
                            <p style="width: 250px; float: left; padding-right: 20px;" ><b>Số điện thoại: </b><input type="text" name="sodt" size="15" class="xx" id="add_"></p>
                            <p style="width: 260px; float: left; padding-right: 20px;" ><b>Email: </b><input type="text" name="email" size="15" class="xx" id="add_"></p>
                            <div>
                                <p style="width: 300px; float: left; padding-right: 20px;" ><b>Giới tính:</b>
                                    <input type="radio" name="gioitinh" value="Nam"> Nam </input>
                                    <input type="radio" name="gioitinh" value="Nữ"> Nữ </input>
                                </p>
                            </div>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-hs" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>