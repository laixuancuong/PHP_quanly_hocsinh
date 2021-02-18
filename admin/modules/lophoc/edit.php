<?php require_once __DIR__. "/../../layouts/header.php";
$id=$_GET['id'];
$ud_lh = mysqli_query($conn,"SELECT * FROM lop l INNER JOIN khoi k ON k.makhoi = l.makhoi  WHERE malh =".$id);  
?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa lớp học
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /#page-wrapper -->
            <?php
                if (isset($_POST['update-lh'])){
                    $sql_update = "UPDATE `lop` SET tenlop ='".$_POST['tenlop']."', makhoi = '".$_POST['makhoi']."' WHERE  malh ='".$_GET['id']."'"; 
                    $conn->query($sql_update);
                    echo "Bạn đã cập nhật thành công! <a href='index.php'>Trở lại</a>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" name="form_logo" enctype="multipart/form-data">
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Tên lớp</label>
                            </div>
                            <div class="col-75">
                                <?php
                                    while ($row = mysqli_fetch_assoc($ud_lh))
                                    {
                                ?>
                                <input type="text" id="add_" name='tenlop' value="<?php echo $row['tenlop']; ?>" placeholder="Tên lớp">
                                
                            </div>
                        </div>
                        
                        <div class="row row-login">
                            <p style="width: 300px; float: left; padding-right: 20px;" >Khối:
                                <select name="makhoi" id="">
                                    <option value="<?php echo $row['makhoi']; ?>"><?php echo $row['tenkhoi']; ?></option>
                                        <?php 
                                            foreach($khoi as $row ){
                                                echo "
                                                <option value=".$row['makhoi'].">".$row['tenkhoi']."</option>
                                                        ";
                                            }
                                        ?>
                                </select>
                            </p>
                            <?php
                                }
                            ?>
                        </div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="update-lh" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php";?>