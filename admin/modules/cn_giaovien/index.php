<?php require_once __DIR__. "/../../layouts/header.php";?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chức năng giáo viên
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
                                                <td><span style="margin-right: 10px">Khối: </span></td>
                                                <td>
                                                    <select name="makhoi" class="subject-select" style="width:150px;">
                                                            <option value="">--chọn--</option>
                                                            <?php 
                                                                    foreach($khoi as $row ){
                                                                         echo "
                                                                        <option value=".$row['makhoi'].">".$row['tenkhoi']."</option>
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
                    $sql_dl = "SELECT * FROM chucnang_gv cngv INNER JOIN giaovien gv ON gv.magv = cngv.magv INNER JOIN monhoc mh ON mh.mamh = cngv.mamh INNER JOIN khoi k ON k.makhoi = cngv.makhoi WHERE k.makhoi = ".$_POST['makhoi']."";
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
                                            <th align='center'>Họ tên đệm</th>
                                            <th align='center'>Tên</th>
                                            <th align='center'>Môn giảng dạy</th>
                                            <th align='center'>Khối</th>
                                            <th align='center'>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 1;
                                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                // Thiết lập mảng lưu lỗi => Mặc định rỗng

                                                $error = array();
                                                if (empty($_POST['makhoi'])) {
                                                    $error['makhoi'] = "Bạn cần chọn khối";
                                                } else {
                                                    $makhoi = $_POST['makhoi'];
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
                                                                    <td align='center'>".$row['ten_gv']."</td>
                                                                    <td align='center'>".$row['tenmh']."</td>
                                                                    <td align='center'>".$row['tenkhoi']."</td>
                                                                    <td class='center' style='width: 12%'>
                                                                        <a class='btn btn-xs btn-info' align='center' href='edit.php?id=".$row['id_cn_gv']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                        <a class='btn btn-xs btn-danger' align='center' href='delete.php?id=".$row['id_cn_gv']."'> <i class='fa fa-times'></i> Xoá</a>
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
                                                foreach($dl_cngv as $row){
                                                            echo "
                                                                <tr class='odd gradeX'>
                                                                    <td align='center'>
                                                                        ".$stt."
                                                                    </td>
                                                                    <td align='center'>".$row['hoten_dem']."</td>
                                                                    <td align='center'>".$row['ten_gv']."</td>
                                                                    <td align='center'>".$row['tenmh']."</td>
                                                                    <td align='center'>".$row['tenkhoi']."</td>
                                                                    <td class='center' style='width: 12%'>
                                                                        <a class='btn btn-xs btn-info' align='center' href='edit.php?id=".$row['id_cn_gv']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                        <a class='btn btn-xs btn-danger' align='center' href='delete.php?id=".$row['id_cn_gv']."'> <i class='fa fa-times'></i> Xoá</a>
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