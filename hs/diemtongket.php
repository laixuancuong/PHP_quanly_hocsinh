<?php require_once __DIR__. "/../layouts/header-hs.php";?>
<div class="main">
    <div class="wrap-main">
<?php require_once __DIR__. "/../layouts/menu-hs.php";?>
        <!--end-menu-main-->
        <div class="list-main">
            <div class="list-row">
                <div class="panel-header" style="background: white; border-bottom: 1px solid #dddddd">
                    <table style="width: 100%">
                        <form action="" method="POST">
                        <tbody>
                            <tr>
                                <td>
                                    <h4>Quản lý điểm chi tiết</h4>
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
                                                    <span style="margin-right: 10px;"><button style=" height: 30px;" class="btn-ct info" name="search"><i class="fa fa-search"></i></button></span>
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
                 <form action="" method="POST">
                </div>
                <!--end-list-row-->
                </form>
            <div class="list-row">
                    <div class="topnav">
                        <a class="active" href="/qlhs/index.php">Trang chủ</a>
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
                                    <th class="center-header" scope="col" >Môn học</th>
                                    <th class="center-header" scope="col" >Điểm học kỳ 1</th>
                                    <th class="center-header" scope="col" >Điểm học kỳ 2</th>
                                    <th class="center-header" scope="col" >Điểm tổng kết môn</th>
                                    <th class="center-header" scope="col" >Năm học</th>
                                </tr>
                                <tr>
                            <?php
                            $stt = 1;
                            if(isset($_POST['search'])){
                                $id_namhoc = $_POST["id_namhoc"];
                                $sql = "SELECT * FROM hocsinh hs INNER JOIN diem_tk dtk ON dtk.mahs = hs.mahs INNER JOIN monhoc mh ON dtk.mamh = mh.mamh INNER JOIN namhoc nh ON nh.id_namhoc = dtk.id_namhoc
                                    WHERE dtk.id_namhoc = ".$id_namhoc." AND hs.mahs = ".$_SESSION['user_hs']." ";
                            }else{
                                $sql = "SELECT * FROM hocsinh hs INNER JOIN diem_tk dtk ON dtk.mahs = hs.mahs INNER JOIN monhoc mh ON dtk.mamh = mh.mamh INNER JOIN namhoc nh ON nh.id_namhoc = dtk.id_namhoc
                                    WHERE dtk.id_namhoc = (SELECT MAX(id_namhoc) FROM diem_tk) AND  hs.mahs = ".$_SESSION['user_hs']." ";
                            }
                                $dl = $conn->query($sql);
                                $num_rows = mysqli_num_rows($dl);
                                if ($num_rows>=1) {
                                    foreach($dl as $row){
                                        $stt = 1;
                                        echo "
                                            <tr class='odd gradeX' id='hienthi'>
                                                <td align='center'>
                                                                ".$stt."
                                                </td>
                                                <td align='center'>".$row['tenmh']."</td>
                                                <td align='center'>".$row['diemhk1']."</td>
                                                <td align='center'>".$row['diemhk2']."</td>
                                                <td align='center'>".$row['diemtkm']."</td>
                                                <td align='center'>".$row['namhoc']."</td>
                                            </tr>
                                                            ";
                                            $stt ++;
                                    }
                                }else{
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