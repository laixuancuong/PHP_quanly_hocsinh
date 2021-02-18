<?php require_once __DIR__. "/../../layouts/header.php";?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới phân công giảng dạy
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Giáo viên</label>
                            </div>
                            <div class="col-75">
                                <select name="id_cn_gv" class="tmn" id="add_">
                                    <option value="">--chọn--</option>
                                    <?php 
                                        foreach($dl_cngv as $row ){
                                            echo "
                                                <option value=".$row['id_cn_gv'].">".$row['hoten_dem']." ".$row['ten_gv']." - Môn: ".$row['tenmh']." - Khối: ".$row['tenkhoi']."</option>
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
                                    <option value="">--chọn--</option>
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
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-pcgd" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>