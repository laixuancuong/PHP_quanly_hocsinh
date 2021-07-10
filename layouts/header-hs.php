<?php
    session_start();
    if (!isset($_SESSION['user_hs'])){
            header("location: /qlhs/login.php");
    }
    require_once __DIR__. "../../libs/database_hs.php";
    $sql = "SELECT hoten_dem, ten_hs FROM hocsinh WHERE mahs = ".$_SESSION['user_hs']."";
    $name = $conn->query($sql);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/icon-logo" href="/qlhs/img/logo.png">
    <!--------------------------------css---------------------------------------------->
    <link rel="stylesheet" type="text/css" href="/qlhs/public/fontend/css/style.css">
    <link rel="stylesheet" type="text/css" href="/qlhs/public/fontend/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/qlhs/public/fontend/css/box_show.css">
    <link rel="stylesheet" type="text/css" href="/qlhs/public/fontend/css/news.css">
    <link rel="stylesheet" type="text/css" href="/qlhs/public/fontend/css/list_row.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    -->
    
    <link rel="stylesheet" href="/qlhs/public/fontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="/qlhs/public/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!--------------------------------js---------------------------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Cổng học sinh trường THPT chuyên đại học vinh</title>
</head>
<body>
    <div class="header">
        <div class="wrap">
            <div class="header-left">
                <a href="#"><img class="logo" src="/qlhs/img/logo.png" /></a>
                <h4>Trường THPT chuyên Đại học Vinh</h4>
            </div>
            
            <div class="header-right">
                <ul>
                    <li>
                        <div class="dropdown-icon">
                            <div class="dr-icon">
                                <a class="dropbtn" href="#" onclick="myFunction1()" role="button"><i class="fas fa-th"></i></a>
                            </div>
                            <div id="ud" class="dropdown-content">
                            <a href="">
                                <span class="item-icon-small">
                                    <img src="/qlhs/img/logo.png"></span>
                                <span class="item-icon-title">Trang Web</span>
                            </a>
                            <a href="">
                                <span class="item-icon-small">
                                    <img src="/qlhs/img/thong_bao.png"></span>
                                <span class="item-icon-title">Thông báo</span>
                            </a>
                          </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-icon">
                            <div class="dr-icon">
                                <a class="dropbtn" href="#" onclick="myFunction2()" role="button"><i class="fa fa-user"></i></a>
                            </div>
                            <div id="us" class="dropdown-content">
                                <table class="list-item" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" style="text-align: center">
                                                <a href="#">
                                                <span id="lbFullName" class="fullName"><b>
                                                    <?php 
                                                           if (isset($_SESSION['user_hs']) && $name){
                                                            foreach($name as $row){
                                                               echo "".$row['hoten_dem']." ".$row['ten_hs']."<br/>";
                                                            }
                                                           }
                                                    ?>
                                                </b></span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/qlhs/hs/hoso.php"><i class="fa fa-address-card" aria-hidden="true"
                                                        style="margin-right: 10px"></i><span class="item-icon-title">Hồ
                                                        sơ</span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#"><i class="fa fa-cogs" aria-hidden="true"
                                                        style="margin-right: 10px"></i><span
                                                        class="item-icon-title">Thiết lập</span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#"><i class="fa fa-question-circle" aria-hidden="true"
                                                        style="margin-right: 10px"></i><span class="item-icon-title">Báo lỗi</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <a href="/qlhs/logout.php" class="btn-logout">
                                <button id="btnLogout" type="button" class="btn lg"><i class="fas fa-sign-out-alt"></i><span class="lg">Đăng
                                        xuất</span></button>
                            </a>
                          </div>
                        </div>
                    </li>
                </ul>
                <script>
                    function myFunction1() {
                      document.getElementById("ud").classList.toggle("show");
                    }

                    function filterFunction() {
                      var input, filter, ul, li, a, i;
                      filter = input.value.toUpperCase();
                      div = document.getElementById("ud");
                      a = div.getElementsByTagName("a");
                      for (i = 0; i < a.length; i++) {
                        txtValue = a[i].textContent || a[i].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                          a[i].style.display = "";
                        } else {
                          a[i].style.display = "none";
                        }
                      }
                    }
                </script>
                <script>
                    function myFunction2() {
                      document.getElementById("us").classList.toggle("show");
                    }

                    function filterFunction() {
                      var input, filter, ul, li, a, i;
                      filter = input.value.toUpperCase();
                      div = document.getElementById("us");
                      a = div.getElementsByTagName("a");
                      for (i = 0; i < a.length; i++) {
                        txtValue = a[i].textContent || a[i].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                          a[i].style.display = "";
                        } else {
                          a[i].style.display = "none";
                        }
                      }
                    }
                </script>
            </div>
        </div>
    </div>
    <!--end--header-->