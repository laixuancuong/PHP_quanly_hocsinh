<?php require_once __DIR__. "/../../layouts/header.php";?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phân công lớp học
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
                                            <tr style="float: left;">
                                                <td><span style="margin-right: 10px">  Lớp: </span></td>
                                                <td>
                                                    <select name="malh" class="subject-select" style="width:150px;">
                                                            <option value="">--chọn--</option>
                                                            <?php 
                                                                    foreach($lophoc as $row ){
                                                                         echo "
                                                                        <option value=".$row['malh'].">".$row['tenlop']."</option>
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
            </div>
            <!-- /.row -->
            <?php
                if(isset($_POST['search'])){
                    $search = "ds";
                    $sql_dl = "SELECT *  FROM phancong_lh pclh INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN giaovien gv ON gv.magv = pccn.magv INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs INNER JOIN namhoc nh ON pccn.id_namhoc = nh.id_namhoc INNER JOIN lop l ON pccn.malh = l.malh WHERE nh.id_namhoc = ".$_POST['id_namhoc']." AND l.malh = ".$_POST['malh']." ORDER BY hs.mahs DESC";
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
                                            <th align='center'>STT</th>
                                            <th align='center'>Họ tên học sinh</th>
                                            <th align='center'>Mã HS</th>
                                            <th align='center'>Lớp</th>
                                            <th align='center'>Chủ nhiệm</th>
                                            <th align='center'>Năm học</th>
                                            <th align='center'>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 1;
                                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                // Thiết lập mảng lưu lỗi => Mặc định rỗng

                                                $error = array();
                                                if (empty($_POST['malh'] && $_POST['id_namhoc'])) {
                                                    $error['malh'] = "Bạn cần chọn khối và năm học";
                                                } else {
                                                    $malh = $_POST['malh'];
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
                                                                    <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                                    <td align='center'>".$row['mahs']."</td>
                                                                    <td align='center'>".$row['tenlop']."</td>
                                                                    <td align='center'>".$row['ten_gv']."</td>
                                                                    <td align='center'>".$row['namhoc']."</td>
                                                                    <td class='center' style='width: 12%'>
                                                                        <a class='btn btn-xs btn-info' align='center' href='edit.php?id=".$row['id_pc_lh']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                        <a class='btn btn-xs btn-danger' align='center' href='delete.php?id=".$row['id_pc_lh']."'> <i class='fa fa-times'></i> Xoá</a>
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
                                                foreach($dl_pclh as $row){
                                                            echo "
                                                                <tr class='odd gradeX'>
                                                                    <td align='center'>
                                                                        ".$stt."
                                                                    </td>
                                                                    <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                                    <td align='center'>".$row['mahs']."</td>
                                                                    <td align='center'>".$row['tenlop']."</td>
                                                                    <td align='center'>".$row['ten_gv']."</td>
                                                                    <td align='center'>".$row['namhoc']."</td>
                                                                    <td class='center' style='width: 12%'>
                                                                        <a class='btn btn-xs btn-info' align='center' href='edit.php?id=".$row['id_pc_lh']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                        <a class='btn btn-xs btn-danger' align='center' href='delete.php?id=".$row['id_pc_lh']."'> <i class='fa fa-times'></i> Xoá</a>
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