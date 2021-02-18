<?php require_once __DIR__. "/../layouts/header-gv.php";?>
<div class="main">
    <div class="wrap-main">
<?php require_once __DIR__. "/../layouts/menu-gv.php";?>
        <!--end-menu-main-->
        <div class="list-main">
            <div class="list-row">
                <div class="panel-header" style="background: white; border-bottom: 1px solid #dddddd">
                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Quản lý lớp học</h4>
                                </td>
                                <td style="float: right">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><span style="margin-right: 10px">Năm học: </span></td>
                                                <td>
                                                    <select class="subject-select" style="width:150px;">
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
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end-panel-header-->
                <form action="" method="POST">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <tr>
                                    <td><span>Tên lớp: </span></td>
                                    <td>
                                        <select name="malop" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($gv_lop as $row ){
                                                         echo "
                                                        <option value=".$row['malh'].">".$row['tenlop']."</option>
                                                        ";
                                                    }
                                            ?>
                                         </select>
                                    </td>
                                    <td><span>Học sinh: </span></td>
                                    <td>
                                        <select name="mahs" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($dl_hocsinh as $row ){
                                                         echo "
                                                        <option value=".$row['mahs'].">".$row['hoten_dem']." ".$row['ten_hs']." - Khoá: ".$row['tenkhoahoc']."</option>
                                                        ";
                                                    }
                                            ?>
                                         </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                </div>
                <!--end-list-row-->
                <div class="btn-control">
                    <button class="btn-ct success" name="searchHS" >Tìm</button>
                    <button class="btn-ct info">Thêm</button>
                </div>
            </form>
            <?php
                if(isset($_POST['searchHS'])){
                    $search = "search";
                    $sql_dl = "SELECT * FROM hocsinh hs INNER JOIN lop l ON l.malh = hs.malh INNER JOIN giaovien gv ON gv.magv = l.magv WHERE l.malh = ".$_POST['malop']."";
                    $result_dlhs = $conn->query($sql_dl);
                }
            ?>

            <div class="list-row">
                    <div class="topnav">
                        <a class="active" href="/qlhs_ht/gv//index.php">Trang chủ</a>
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
                                    <th class="center-header" scope="col" >Họ tên</th>
                                    <th class="center-header" scope="col" >Lớp</th>
                                    <th class="center-header" scope="col" >Ngày sinh</th>
                                    <th class="center-header" scope="col" >Địa chỉ</th>
                                    <th class="center-header" scope="col" >Số điện thoại</th>
                                </tr>
                                <tr>
                                        <?php
                                        $stt = 1;
                                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                            // Thiết lập mảng lưu lỗi => Mặc định rỗng

                                            $error = array();
                                            if (empty($_POST['malop'])) {
                                                $error['malh'] = "Bạn cần chọn lớp";
                                            } else {
                                                $malh = $_POST['malop'];
                                            }
                                            // Kiểm tra có lỗi hay không
                                            if (empty($error)) {
                                                switch ($search) {
                                                    case "search":
                                                    foreach($result_dlhs as $row){
                                                        echo "
                                                        <tr class='odd gradeX' id='hienthi'>
                                                            <td align='center'>
                                                                ".$stt."
                                                            </td>
                                                            
                                                            <td align='center'>".$row['hoten_dem']." ".$row['ten_hs']."</td>
                                                            <td align='center'>".$row['tenlop']."</td>
                                                            <td align='center'>".$row['ngaysinh']."</td>
                                                            <td align='center'>".$row['diachi']."</td>
                                                            <td align='center'>".$row['sodt']."</td>
                                                        </tr>
                                                        ";
                                                        $stt ++;
                                                    }
                                                    break;
                                                    default:
                                                            echo "
                                                            <tr class='odd gradeX'>
                                                                <td align='center'>Dữ liệu rỗng</td>
                                                            </tr>
                                                            ";
                                                    break;
                                                }

                                            }
                                        }
                                        else{
                                            echo "
                                                            <tr class='odd gradeX'>
                                                                Không có dữ liệu hiển thị
                                                            </tr>
                                                            ";
                                        }

                                    ?>
                                                    <tr class='odd gradeX' id='hienthi'>
                                                        <tr>
                                                            <?php if (isset($error['malh'])) echo $error['malh']; ?>
                                                        </tr>
                                                           
                                                        
                                                    </tr>
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