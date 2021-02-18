<?php require_once __DIR__. "/../../layouts/header.php";?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
                                            <th>Tài khoản</th>
                                            <th>Họ tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày đăng ký</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 1;
                                            foreach($account as $row){
                                                            echo "
                                                                <tr class='odd gradeX'>
                                                                    <td align='center'>
                                                                        ".$stt."
                                                                    </td>
                                                                    <td>".$row['username']."</td>
                                                                    <td align='center'>".$row['hoten']."</td>
                                                                    <td align='center'>".$row['dienthoai']."</td>
                                                                    <td align='center'>".$row['ngaydk']."</td>
                                                                    <td align='center' style='width: 12%'>
                                                                        <a class='btn btn-xs btn-info' align='center' href='edit.php?id=".$row['id_account']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                        <a class='btn btn-xs btn-danger' align='center' href='delete.php?id=".$row['id_account']."'> <i class='fa fa-times'></i> Xoá</a>
                                                                    </td>
                                                                </tr>
                                                                ";
                                                                $stt ++;
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