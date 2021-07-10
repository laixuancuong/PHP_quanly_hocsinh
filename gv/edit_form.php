<?php require_once __DIR__. "/../layouts/header-gv.php";?>
<div class="main">
    <div class="wrap-main">
<?php require_once __DIR__. "/../layouts/menu-gv.php";?>
        <!--end-menu-main-->
<?php 
$mahl=$_GET['mahl'];
$ud_hl = mysqli_query($conn,"SELECT * FROM phancong pc INNER JOIN lop l ON l.malh = pc.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh INNER JOIN hoclieu hl ON hl.mapc = pc.mapc
                                            WHERE mahl =".$mahl);
?>
        <div class="list-main">
            <div class="list-row">
                <div class="panel-header" style="background: white; border-bottom: 1px solid #dddddd">
                    <table style="width: 100%">
                    <form action="" method="POST">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Trang sửa</h4>
                                </td>
                                <td style="float: right">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><span style="margin-right: 10px">Năm học: </span></td>
                                                <td>
                                                    <select name='id_namhoc' type='submit' class="subject-select" style="width:150px; margin-right: 10px; ">
                                                            <?php 
                                                                    foreach($namhoc as $row ){
                                                                         echo "
                                                                        <option value=".$row['id_namhoc'].">".$row['namhoc']."</option>
                                                                        ";
                                                                    }
                                                            ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <span style="margin-right: 10px;"><button style=" height: 30px;" class="btn-ct info" name="search-lop"><i class="fa fa-search"></i></button></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </form>
                    </table>
                </div>
                <!--end-panel-header-->
                <form action="/qlhs/libs/function.php" method="POST" enctype = "multipart/form-data">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <tr>
                                    <td><span>Lớp học: </span></td>
                                    <td>
                                        <select name="mapc" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($dl_mon as $row ){
                                                         echo "
                                                        <option value=".$row['mapc'].">".$row['tenlop']." - ".$row['tenmh']."</option>
                                                        ";
                                                    }
                                            ?>
                                         </select>
                                    </td>
                                    <td><span>Nội dung:
                                     </span></td>
                                    <td>
                                        <input type="text" name="noidung" >
                                    </td>
                                    <td><span>File tài liệu </span></td>
                                    <td>
                                        <input type="file" name="file_kem" >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                </div>
                <!--end-list-row-->
                <div class="btn-control">
                    <button class="btn-ct info" name="ud-gv_hoclieu">Cập nhật</button>
                </div>
            </form>
        </div>
        <!--end--list-main-->
        </form>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>