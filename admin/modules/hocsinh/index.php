<?php require_once __DIR__. "/../../layouts/header.php";?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Học sinh
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
                                                <td><span style="margin-right: 10px">Năm học: </span></td>
                                                <td>
                                                    <select name="id_namhoc" class="subject-select" style="width:150px;">
                                                            <option value="">--chọn--</option>
                                                            <?php 
                                                                    foreach($namhoc as $row ){
                                                                         echo "
                                                                        <option value=".$row['id_namhoc'].">".$row['namhoc']."</option>
                                                                        ";
                                                                    }
                                                            ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr style="float: right; padding-top: 5px;">
                                                <td >
                                                    <button class="btn btn-success" type="submit" name="searchHS" value="search"><i class="fa fa-search"></i></button>
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
            </div>
            <!-- /.row -->
            <?php
                if(isset($_POST['searchHS'])){
                    $search = "ds";
                    $sql_dl = "SELECT * FROM hocsinh hs INNER JOIN khoahoc kh ON hs.id_khoahoc = kh.id_khoahoc INNER JOIN namhoc nh ON nh.id_namhoc = kh.id_namhoc
                        WHERE nh.id_namhoc = ".$_POST['id_namhoc']."";
                    $result_dlhs = $conn->query($sql_dl);
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="POST">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách
                            <div class="link-create" style="float: right;">
                                <a href="add.php">Thêm mới</a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên đệm</th>
                                            <th>Tên</th>
                                            <th>Mã học sinh</th>
                                            <th>Ngày sinh</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
                                            <th>Khoá</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 1;
                                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                // Thiết lập mảng lưu lỗi => Mặc định rỗng

                                                $error = array();
                                                if (empty($_POST['id_namhoc'])) {
                                                    $error['id_namhoc'] = "Bạn cần chọn năm học";
                                                } else {
                                                    $id_namhoc = $_POST['id_namhoc'];
                                                }
                                                // Kiểm tra có lỗi hay không
                                                if (empty($error)) {
                                                    switch ($search) {
                                                        case "ds":
                                                        foreach($result_dlhs as $row){
                                                            echo "
                                                                <tr class='odd gradeX'>
                                                                    <td align='center'>
                                                                        ".$stt."
                                                                    </td>
                                                                    <td align='center'>".$row['hoten_dem']."</td>
                                                                    <td align='center'>".$row['ten_hs']."</td>
                                                                    <td align='center'>".$row['mahs']."</td>
                                                                    <td align='center'>".$row['ngaysinh']."</td>
                                                                    <td align='center'>".$row['gioitinh']."</td>
                                                                    <td align='center'>".$row['diachi']."</td>
                                                                    <td align='center'>".$row['sodt']."</td>
                                                                    <td align='center'>".$row['email']."</td>
                                                                    <td align='center'>".$row['tenkhoahoc']."</td>
                                                                    <td class='center' style='width: 12%'>
                                                                        <a class='btn btn-xs btn-info' align='center' href='edit.php?id=".$row['mahs']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                        <a class='btn btn-xs btn-danger' align='center' href='delete.php?id=".$row['mahs']."'> <i class='fa fa-times'></i> Xoá</a>
                                                                    </td>
                                                                </tr>
                                                                ";
                                                                $stt ++;
                                                        }
                                                         break;
                                                    }
                                                }
                                            }
                                            else{
                                                foreach($dl_hocsinh as $row){
                                                            echo "
                                                                <tr class='odd gradeX'>
                                                                    <td align='center'>
                                                                        ".$stt."
                                                                    </td>
                                                                    <td align='center'>".$row['hoten_dem']."</td>
                                                                    <td align='center'>".$row['ten_hs']."</td>
                                                                    <td align='center'>".$row['mahs']."</td>
                                                                    <td align='center'>".$row['ngaysinh']."</td>
                                                                    <td align='center'>".$row['gioitinh']."</td>
                                                                    <td align='center'>".$row['diachi']."</td>
                                                                    <td align='center'>".$row['sodt']."</td>
                                                                    <td align='center'>".$row['email']."</td>
                                                                    <td align='center'>".$row['tenkhoahoc']."</td>
                                                                    <td class='center' style='width: 12%'>
                                                                        <a class='btn btn-xs btn-info' align='center' href='edit.php?id=".$row['mahs']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                        <a class='btn btn-xs btn-danger' align='center' href='delete.php?id=".$row['mahs']."'> <i class='fa fa-times'></i> Xoá</a>
                                                                    </td>
                                                                </tr>
                                                                ";
                                                                $stt ++;
                                                        }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>