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
            <?php
                if (isset($_POST['ud-gv_hoclieu'])){
                    $error = array();
                        $target_dir = "file_tailieu/";
                        $target_file = $target_dir . basename($_FILES['file_kem']['name']);
                        // Kiểm tra kiểu file hợp lệ
                        $type_file = pathinfo($_FILES['file_kem']['name'], PATHINFO_EXTENSION);
                        $type_fileAllow = array('zip', 'pdf', 'doc', 'docx');
                        $noidung = $_POST['noidung'];
                        $mapc = $_POST['mapc'];
                        if (!in_array(strtolower($type_file), $type_fileAllow)) {
                            $error['file_kem'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn file zip, pdf, doc, docx. <a href='javascript: history.go(-1)'>Trở lại</a>";
                        }
                        //Kiểm tra kích thước file
                        $size_file = $_FILES['file_kem']['size'];
                        if ($size_file > 5242880) {
                            $error['file_kem'] = "File bạn chọn không được quá 5MB. <a href='javascript: history.go(-1)'>Trở lại</a>";
                        }
                    //
                        if (empty($error)) {
                            if (move_uploaded_file($_FILES["file_kem"]["tmp_name"], $target_file)) {
                                $upload_query = mysqli_query($conn,"UPDATE hoclieu SET mapc ='".$_POST['mapc']."', noidung = '".$_POST['noidung']."', noidung = '".$_POST['noidung']."' , file_kem = '".$target_file."' WHERE  mahl ='".$mahl."' ");
                                $flag = true;
                                header("Location: ../gv/hoclieu.php");

                            } else {
                                echo "File bạn vừa upload gặp sự cố <a href='javascript: history.go(-1)'>Trở lại</a>";
                            }
                        }
                }
            ?>
        <div class="list-main">
            <div class="list-row">
                <div class="panel-header" style="background: white; border-bottom: 1px solid #dddddd">
                    <table style="width: 100%">
                    <form action="" method="POST">
                    <?php
                        while ($rows = mysqli_fetch_assoc($ud_hl))
                        {
                    ?>
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Sửa học liệu</h4>
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
                <form action="" method="POST" enctype = "multipart/form-data">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <tr>
                                    <td><span>Lớp học: </span></td>
                                    <td>
                                        <select name="mapc" id="">
                                            <option value="<?php echo $rows['mapc']; ?>"><?php echo $rows['tenlop']; ?></option>
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
                                        <input type="text" name="noidung" value="<?php echo $rows['noidung']; ?>" >
                                    </td>
                                    <td><span>File tài liệu </span></td>
                                    <td>
                                        <input type="file" name="file_kem" value="<?php echo $rows['file_kem']; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                </div>
                    <?php
                        }
                    ?>
                <!--end-list-row-->
                <div class="btn-control">
                    <button class="btn-ct success" name="add-gv_hoclieu">Thêm</button>
                    <button class="btn-ct info" name="ud-gv_hoclieu">Cập nhật</button>
                </div>
            </form>
            <div class="list-row">
                    <div class="topnav">
                        <a class="active" href="/qlhs/gv//index.php">Trang chủ</a>
                        <div class="search-container">
                            <form action="" method="POST">
                                <input type="text" placeholder="Search.." name="ten">
                                <button type="submit" name="search" value="search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!--end--topnav-->
                
                <form action="" method="POST">
                    <div class="panel-body">
                        <table class="table table-bordered" cellspacing="0" cellpadding="5" rules="all" border="1">
                            <tbody>
                                <tr>
                                    <th class="center-header" scope="col" style="width:1%;">STT</th>
                                    <th class="center-header" scope="col" >Nội dung</th>
                                    <th class="center-header" scope="col" >File</th>
                                    <th class="center-header" scope="col" >Lớp</th>
                                    <th class="center-header" scope="col" >Môn</th>
                                    <th class="center-header" scope="col" >Ngày đăng</th>
                                    <th class="center-header" scope="col" >Thao tác</th>
                                </tr>
                                <tr>
                                        <?php
                                        $stt = 1;
                                        if(isset($_POST['search-lop'])){
                                            $id_namhoc = $_POST["id_namhoc"];
                                            $sql = "SELECT * FROM phancong pc INNER JOIN lop l ON l.malh = pc.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh INNER JOIN hoclieu hl ON hl.mapc = pc.mapc
                                            WHERE pc.id_namhoc = ".$id_namhoc." AND  cngv.magv = ".$_SESSION['user_gv']." ORDER BY hl.mahl DESC
                                                ";
                                            $dl = $conn->query($sql);
                                            foreach($dl as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['noidung']."</td>
                                                            <td align='center'>".$row['file_kem']."</td>
                                                            <td align='center'>".$row['tenlop']."</td>
                                                            <td align='center'>".$row['tenmh']."</td>
                                                            <td align='center'>".$row['ngaydang']."</td>
                                                            <td align='center' style='width: 12%'>
                                                                <a class='btn btn-xs btn-info' align='center' href='edit_hoclieu.php?mahl=".$row['mahl']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                <a class='btn btn-xs btn-danger' align='center' href='delete.php?mahl=".$row['mahl']."'> <i class='fa fa-times'></i> Xoá</a>
                                                            </td>
                                                        </tr>
                                                        ";
                                                        $stt ++;
                                                    }
                                        }else{
                                            foreach($dl_hoclieu as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            <td align='center'>".$row['noidung']."</td>
                                                            <td align='center'>".$row['file_kem']."</td>
                                                            <td align='center'>".$row['tenlop']."</td>
                                                            <td align='center'>".$row['tenmh']."</td>
                                                            <td align='center'>".$row['ngaydang']."</td>
                                                            <td align='center' style='width: 12%'>
                                                                <a class='btn btn-xs btn-info' align='center' href='edit_hoclieu.php?mahl=".$row['mahl']."'> <i class='fa fa-edit'></i> Sửa</a>
                                                                <a class='btn btn-xs btn-danger' align='center' href='delete.php?mahl=".$row['mahl']."'> <i class='fa fa-times'></i> Xoá</a>
                                                            </td>
                                                        </tr>
                                                        ";
                                                        $stt ++;
                                                    }
                                        }
                                        if ($stt<=1) {
                                            echo "<tr class='odd gradeX' id='hienthi'>Không có dữ liệu</td>";
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
            </div>
            <!--end--list-row-->
        </div>
        <!--end--list-main-->
        </form>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require_once __DIR__. "/../layouts/footer.php";?>