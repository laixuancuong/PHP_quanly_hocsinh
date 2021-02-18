<?php require_once __DIR__. "/../../layouts/header.php";?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới lớp học
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên lớp</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='tenlop' placeholder="Tên lớp">
                            </div>
                        </div>
                        
                        <div class="row row-login">
                            <p style="width: 300px; float: left; padding-right: 20px;" >Khối:
                                <select name="makhoi" id="">
                                    <option value="">--chọn--</option>
                                            <?php 
                                            foreach($khoi as $row ){
                                                echo "
                                                <option value=".$row['makhoi'].">".$row['tenkhoi']."</option>
                                                        ";
                                            }
                                        ?>
                                </select>
                            </p>
                        </div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-lh" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>