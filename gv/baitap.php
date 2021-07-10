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
                                                <td><span style="margin-right: 10px">Học kỳ: </span></td>
                                                <td>
                                                    <select class="subject-select" style="width:150px;">
                                                        <option selected="selected" value="2_2019-2020">2_2019-2020
                                                        </option>
                                                        <option value="2_2018-2019">2_2018-2019</option>
                                                        <option value="1_2019-2020">1_2019-2020</option>
                                                        <option value="1_2018-2019">1_2018-2019</option>
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
                <?php
                    $sql = "select * from monhoc" ;
                    $monhoc = $conn->query($sql);
                    $sql = "select * from lop" ;
                    $lop = $conn->query($sql);
                ?>
                <form action="" method="POST">
                    <div class="panel-body">
                        <table cellpadding="10">
                            <tbody>
                                <tr>
                                <td><span>Tên môn học: </span></td>
                                    <td>
                                        <select name="mamh" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($monhoc as $row ){
                                                        echo "
                                                        <option value=".$row['mamh'].">".$row['tenmh']."</option>
                                                        ";
                                                    }
                                                ?>
                                        </select>
                                    </td>
                                    <td><span>Tên lớp: </span></td>
                                    <td>
                                        <select name="malh" id="">
                                            <option value="">--chọn--</option>
                                            <?php 
                                                    foreach($lop as $row ){
                                                        echo "
                                                        <option value=".$row['malh'].">".$row['tenlop']."</option>
                                                        ";
                                                    }
                                                ?>
                                        </select>
                                    </td>
                                    <td><span>Nội dung: </span></td>
                                    <td>
                                        <input type="text" name="noidung">
                                    </td>
                                    
                                    <td><span>Hạn nạp: </span></td>
                                    <td>
                                        <input type="text" name="hannap">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                </div>
                <!--end-list-row-->
                <div class="btn-control">
                    <!-- <input class="btn-ct success" type="submit" value="Thêm" name="addData" /> -->
                    <button class="btn-ct success" name="addData" >Thêm</button>
                    <button class="btn-ct info">Cập nhật</button>
                    <button class="btn-ct danger" onclick="tai_lai_trang()">Huỷ</button>
                </div>
            </form>
            <?php 
                if (isset($_POST['addData'])){
                    $data['noidung'] = isset($_POST['noidung']) ? $_POST['noidung'] : '';
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $_POST['ngaydang'] = date("Y-m-d H:i:s");
                    $errors = array();
                    if (empty($data['noidung'])){
                        $errors['noidung'] = 'Chưa nhập noidung';
                    }
                    if(!$errors){
                        $sql_add = "INSERT INTO `baitap` (`mabt`, `noidung`, `malh`, `mamh`, `ngaydang`,`hannap`) VALUES (NULL,'".$_POST['noidung']."','".$_POST['malh']."','".$_POST['mamh']."','".$_POST['ngaydang']."','".$_POST['hannap']."')";
                        $conn->query($sql_add);
                    }
                }
            ?> <!--thêm-->
            
            <script>
                function tai_lai_trang(){
                    location.reload();
                }
            </script><!--huỷ-->
            <div class="list-row">
                    <div class="topnav">
                        <a class="active" href="/qlhs/gv/index.php">Trang chủ</a>
                        <div class="search-container">
                            <form action="" method="POST">
                                <input type="text" placeholder="Search.." name="ten">
                                <button type="submit" name="search" value="search"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!--end--topnav-->
                <?php
                    error_reporting(0);
                    if(isset($_POST['search'])){
                        $favcolor = "search";
                        $sql_search = "SELECT * FROM baitap bt INNER JOIN lop l ON l.malh = bt.malh INNER JOIN monhoc mh ON mh.mamh = bt.mamh
                                where mh.tenmh like '%".$_POST['ten']."%'
                        ";
                        $result = $conn->query($sql_search);
                    }else {
                        $sql_search = "SELECT * FROM baitap bt INNER JOIN lop l ON l.malh = bt.malh INNER JOIN monhoc mh ON mh.mamh = bt.mamh
                                where mh.tenmh like '%%'
                        ";
                        $result = $conn->query($sql_search);
                    }
                ?>
                <?php
                    $sql = 'SELECT * FROM baitap bt INNER JOIN lop l ON l.malh = bt.malh INNER JOIN monhoc mh ON mh.mamh = bt.mamh';
                    $dulieu = $conn->query($sql);
                ?>
                <form action="" method="POST">
                    <div class="panel-body">
                        <table class="table table-bordered" cellspacing="0" cellpadding="5" rules="all" border="1">
                            <tbody>
                                <tr>
                                    <th class="center-header" scope="col" style="width:1%;">Chọn</th>
                                    <th class="center-header" scope="col" style="width:15%;">Tên Môn học</th>
                                    <th class="center-header" scope="col" style="width:10%;">Tên lớp</th>
                                    <th class="center-header" scope="col" style="width:34%;">Nội dung</th>
                                    <th class="center-header" scope="col" style="width:20%;">Ngày đăng</th>
                                    <th class="center-header" scope="col" style="width:20%;">Hạn nạp</th>
                                </tr>
                                <tr>
                                    <?php
                                        switch ($favcolor) {
                                            case "search":
                                                foreach($result as $row){
                                                    echo "
                                                    <tr>
                                                        <td align='center'>
                                                            <input type='radio' name='select' value=".$row['mabt'].">
                                                        </td>
                                                        
                                                        <td align='center'>".$row['tenmh']."</td>
                                                        <td align='center'>".$row['tenlop']."</td>
                                                        <td align='center'>".$row['noidung']."</td>
                                                        <td align='center'>".$row['ngaydang']."</td>
                                                        <td align='center'>".$row['hannap']."</td>
                                                    </tr>
                                                    ";
                                                }
                                            break;
                                            default:
                                              foreach($dulieu as $row){
                                                  echo "
                                                  <tr>
                                                        <td align='center'>
                                                            <input type='radio' name='select' value=".$row['mabt'].">
                                                        </td>
                                                        
                                                        <td align='center'>".$row['tenmh']."</td>
                                                        <td align='center'>".$row['tenlop']."</td>
                                                        <td align='center'>".$row['noidung']."</td>
                                                        <td align='center'>".$row['ngaydang']."</td>
                                                        <td align='center'>".$row['hannap']."</td>
                                                    </tr>
                                                  ";
                                              }
                                            break;
                                        }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end-panel-body-->
                
            </div>
            <!--end--list-row-->
            <div class="btn-control">
                <button class="btn-ct info" name="editData">Sửa</button>
                <button class="btn-ct danger" name="deleteData">Xoá</button>
            </div>
        </div>
        <!--end--list-main-->
        </form>
        <?php
            if (isset($_POST['deleteData'])){
                $sql_xoa = "delete from baitap where mabt = '".$_POST['select']."'";
                $conn->query($sql_xoa);
            }
        ?>
    </div>
    <!--end--warp-main-->
</div>
<!--end--main-->
<?php require "footer.php"; ?>