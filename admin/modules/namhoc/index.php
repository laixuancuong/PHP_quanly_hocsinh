<?php require_once __DIR__. "/../../layouts/header.php";?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Năm học
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
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
                                            <th>Năm học</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 1;
                                            while ($row = mysqli_fetch_assoc($namhoc))
                                            {
                                        ?>
                                            <tr class="odd gradeX">
                                                <td align='center'><?php echo $stt; ?></td> 
                                                <td align='center'><?php echo $row['namhoc']; ?></td> 
                                                <td align='center' class="center" style="width: 12%">
                                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $row['id_namhoc'];?>"> <i class="fa fa-edit"></i> Sửa</a>
                                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $row['id_namhoc'];?>"> <i class="fa fa-times"></i>Xoá</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $stt++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Khoá</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 1;
                                            while ($row = mysqli_fetch_assoc($khoahoc))
                                            {
                                        ?>
                                            <tr class="odd gradeX">
                                                <td align='center'><?php echo $stt; ?></td> 
                                                <td align='center'><?php echo $row['tenkhoahoc']; ?></td>
                                                <td align='center' class="center" style="width: 12%">
                                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $row['id_khoahoc'];?>"> <i class="fa fa-edit"></i> Sửa</a>
                                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $row['id_khoahoc'];?>"> <i class="fa fa-times"></i>Xoá</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $stt++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Học kỳ</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 1;
                                            while ($row = mysqli_fetch_assoc($kyhoc))
                                            {
                                        ?>
                                            <tr class="odd gradeX">
                                                <td align='center'><?php echo $stt; ?></td> 
                                                <td align='center'><?php echo $row['tenky']; ?></td>
                                                <td align='center' class="center" style="width: 12%">
                                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $row['id_kyhoc'];?>"> <i class="fa fa-edit"></i> Sửa</a>
                                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $row['id_kyhoc'];?>"> <i class="fa fa-times"></i>Xoá</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $stt++;
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
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>
        <!-- /#page-wrapper -->
<?php require_once __DIR__. "/../../layouts/footer.php";?>

                                    