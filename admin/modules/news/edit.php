<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_news = mysqli_query($conn,"SELECT * FROM news WHERE id_news =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa tin tức
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /#page-wrapper -->
            <?php
                if (isset($_POST['update-news'])){
                    $sql_update = "UPDATE `news` SET nd_chinh ='".$_POST['nd_chinh']."', noidung = '".$_POST['noidung']."' WHERE  id_news ='".$_GET['id']."'";
                    $conn->query($sql_update);
                    echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Nội dung chính</label>
                            </div>
                            <div class="col-75">
                                <?php
                                    while ($rows = mysqli_fetch_assoc($ud_news))
                                    {
                                ?>
                                <input type="text" id="add_" name='nd_chinh' value="<?php echo $rows['nd_chinh']; ?>" placeholder="Tên lớp">
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Nội dung</label>
                            </div>
                        </div>
                        <p>
                            <textarea name="noidung" value="<?php echo $rows['noidung']; ?>" id="editor1" rows="10" cols="80"></textarea>
                        </p>
                            <script>    CKEDITOR.replace( 'editor1' );</script>
                            <?php
                                }
                            ?>
                            <div class="row input-sm row-login">
                                <input type="submit" name="update-news" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php";?>