<?php require_once __DIR__. "/../../layouts/header.php";?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới tin tức
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Nội dung chính</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="add_" name='nd_chinh' placeholder="Nội dung chính">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Nội dung</label>
                            </div>
                        </div>
                        <p>
                            <textarea name="noidung" id="editor1" rows="10" cols="80"></textarea>
                            <script>    CKEDITOR.replace( 'editor1' );</script>
                        </p>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Người đăng</label>
                            </div>
                            <div class="col-75">
                                <select name="id_account" class="tmn" id="add_">
                                    <?php
                                        foreach($account_ss as $row ){
                                            echo "
                                                <option value=".$row['id_account'].">".$row['username']."</option>
                                                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row input-sm row-login">
                            <input type="submit" name="add-news" value="Cập nhật" class="upload">
                            <input type="reset" name="reset" value="Nhập lại" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>