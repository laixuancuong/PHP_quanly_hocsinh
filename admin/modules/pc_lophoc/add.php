<?php require_once __DIR__. "/../../layouts/header.php";?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới phân công lớp học
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="POST">
                    <table style="width: 100%; margin-bottom: 20px;">
                        <tbody>
                            <tr>
                                <td>
                                    <table style="width: 100%;">
                                        <tbody>
                                            <tr style="float: left;">
                                                <td><span style="margin-right: 10px">  Khoá: </span></td>
                                                <td>
                                                    <select name="id_khoahoc" class="subject-select" style="width:150px;">
                                                            <option value="">--chọn--</option>
                                                            <?php 
                                                                    foreach($khoahoc as $row ){
                                                                         echo "
                                                                        <option value=".$row['id_khoahoc'].">".$row['tenkhoahoc']."</option>
                                                                        ";
                                                                    }
                                                            ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr style="float: right; padding-top: 5px;">
                                                <td >
                                                    <button class="btn btn-success" type="submit" name="search" value="search"><i class="fa fa-search"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <form action="../../libraries/function.php" method="post" name="form_logo" enctype="multipart/form-data">
                        <?php 
                            $sql = "SELECT * FROM lop l INNER JOIN khoi k ON k.makhoi = l.makhoi INNER JOIN phancong_cn pccn ON pccn.malh = l.malh WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) ORDER BY tenlop";
                            $loph = $conn->query($sql);
                         ?>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Lớp học</label>
                            </div>
                            <div class="col-75">
                                <select name="id_pc_cn" class="tmn" id="add_">
                                    <option value="">--chọn--</option>
                                    <?php 
                                        foreach($loph as $row ){
                                            echo "
                                                <option value=".$row['id_pc_cn'].">".$row['tenlop']."</option>
                                                                        ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row row-login">
                            <div class="col-25">
                                <label class="label-login" for="fname">Danh sách học sinh</label>
                            </div>

                        </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th align='center'>Chọn</th>
                                                <th align='center'>Họ tên học sinh</th>
                                                <th align='center'>Mã học sinh</th>
                                                <th align='center'>Khoá học</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_POST['search'])){
                                                $id_khoahoc = $_POST['id_khoahoc'];
                                                $sql_dl = "SELECT * FROM hocsinh hs INNER JOIN khoahoc kh ON hs.id_khoahoc = kh.id_khoahoc INNER JOIN namhoc nh ON nh.id_namhoc = kh.id_namhoc WHERE kh.id_khoahoc = ".$id_khoahoc." ";
                                                $dl_hs = $conn->query($sql_dl);
                                                    foreach($dl_hs as $row){
                                                        echo "
                                                            <tr class='odd gradeX'>
                                                                <td align='center'>
                                                                    <input type='checkbox' name='hs[]' value='".$row['mahs']."'>
                                                                </td>
                                                                <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                                <td align='center'>".$row['mahs']."</td>
                                                                <td align='center'>".$row['tenkhoahoc']."</td>
                                                            </tr>
                                                            ";
                                                    }
                                                }
                                                
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                        <div>
                            <div class="row input-sm row-login">
                                <input type="submit" name="add-pclh" value="Cập nhật" class="upload">
                                <input type="reset" name="reset" value="Nhập lại" />
                            </div>      
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>