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
                                                <td><span style="margin-right: 10px">Học kỳ: </span></td>
                                                <td>
                                                    <select name='id_kyhoc' type='submit' class="subject-select" style="width:150px; margin-right: 10px; ">
                                                            <?php 
                                                                    foreach($kyhoc as $row ){
                                                                         echo "
                                                                        <option value=".$row['id_kyhoc'].">".$row['tenky']."-".$row['namhoc']."</option>
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
                    <div class="btn-control">
                        <a class='btn-ct info' align='center' href='diemtongket.php'>Điểm tổng kết</a>
                    </div>
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
                                    <th class="center-header" scope="col" >Điểm thường xuyên 1</th>
                                    <th class="center-header" scope="col" >Điểm thường xuyên 2</th>
                                    <th class="center-header" scope="col" >Điểm giữa kỳ</th>
                                    <th class="center-header" scope="col" >Điểm cuối kỳ</th>
                                    <th class="center-header" scope="col" >Học kỳ</th>
                                </tr>
                                <tr>
                            <?php
                            $stt = 1;
                            if(isset($_POST['search'])){
                                $id_kyhoc = $_POST["id_kyhoc"];
                                $sql = "SELECT * FROM hocsinh hs INNER JOIN diem_chitiet dct ON dct.mahs = hs.mahs INNER JOIN monhoc mh ON dct.mamh = mh.mamh INNER JOIN kyhoc kh ON kh.id_kyhoc = dct.id_kyhoc
                                    WHERE kh.id_kyhoc = ".$id_kyhoc." AND  hs.mahs = ".$_SESSION['user_hs']." ";
                            }else{
                                $sql = "SELECT * FROM hocsinh hs INNER JOIN diem_chitiet dct ON dct.mahs = hs.mahs INNER JOIN monhoc mh ON dct.mamh = mh.mamh INNER JOIN kyhoc kh ON kh.id_kyhoc = dct.id_kyhoc
                                    WHERE kh.id_kyhoc = (SELECT MAX(id_kyhoc) FROM kyhoc) AND  hs.mahs = ".$_SESSION['user_hs']." ";
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
                                                <td align='center'>".$row['diemtx1']."</td>
                                                <td align='center'>".$row['diemtx2']."</td>
                                                <td align='center'>".$row['diemgk']."</td>
                                                <td align='center'>".$row['diemck']."</td>
                                                <td align='center'>".$row['tenky']."</td>
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