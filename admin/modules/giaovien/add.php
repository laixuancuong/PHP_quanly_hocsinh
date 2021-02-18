<?php require_once __DIR__. "/../../layouts/header.php";?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới giáo viên
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
                                <label class="label-login" for="fname">Tên</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='ten_gv' placeholder="Tên">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Mật khẩu</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='password' placeholder="Mật khẩu">
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
                            <div class="col-25">
                                <label class="label-login" for="fname">Số điện thoại</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='sodt' placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Email</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='email' placeholder="Email">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div>
                                <p style="width: 300px; float: left; padding-right: 20px;" ><b>Giới tính:</b>
                                    <input type="radio" name="gioitinh" value="Nam"> Nam </input>
                                    <input type="radio" name="gioitinh" value="Nữ"> Nữ </input>
                                </p>
                            </div>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-gv" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>