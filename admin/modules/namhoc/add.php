<?php require_once __DIR__. "/../../layouts/header.php";?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới năm học
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên năm học</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='namhoc' placeholder="Tên năm học">
                            </div>
                        </div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-nh" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên khoá học</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='tenkhoahoc' placeholder="Tên khoá học">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên năm học</label>
                            </div>
                            <div class="col-75">
                                <select name="id_namhoc" id="">
                                    <option value="">--chọn--</option>
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
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-kh" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên học kỳ</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='tenky' placeholder="Tên học kỳ">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên năm học</label>
                            </div>
                            <div class="col-75">
                                <select name="id_namhoc" id="">
                                    <option value="">--chọn--</option>
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
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-hk" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>