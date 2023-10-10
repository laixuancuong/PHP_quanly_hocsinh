<?php session_start();
require_once __DIR__. "../libs/connect.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/icon-logo" href="img/logo.png">
    <!--------------------------------css---------------------------------------------->
    <link rel="stylesheet" type="text/css" href="public/fontend/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/fontend/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--------------------------------js---------------------------------------------->
    
    <title>Trang đăng nhập học sinh</title>
</head>

<body>
    <div class="header">
        <div class="wrap">
            <div class="header-left">
                <a href="#"><img class="logo" src="img/logo.png" /></a>
                <h4>Trường THPT chuyên Đại học Vinh</h4>
            </div>
            
        </div>
    </div>
    <!--end--header-->
<div class="row main-login">
<?php
    if(isset($_POST["dangnhap"]))
    {
        $username= $_POST["username"];
        $password =$_POST["password"];
        //lam sach thong tin
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        $error = array();
        if ($username == "" || $password =="")
        {
            /*echo "Không được để trống!";*/
            $error['null'] = '<span style="color: red;">Tên đăng nhập và mật khẩu không được để trống !</span>';
        }
        else
        {
            $sql = "SELECT * FROM hocsinh WHERE mahs = '$username' and matkhau = '$password' ";
            $query = mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows==0) {
                $error['null'] = '<span style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng !</span>';
            }
            else
            {
                //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                $_SESSION['user_hs'] = $username;
                // chuyển hướng trang web tới một trang index.php
                header('Location: /qlhs/index.php');
            }
        }
    }
?>
        <div class="login">
            <form class="form-login" action="" method='POST' style="max-width:500px;margin:auto">
                <h2>Mời bạn đăng nhập</h2>
                <div class="input-container">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="Username" name="username">
                </div>

                <div class="input-container">
                    <i class="fa fa-key icon"></i>
                    <input class="input-field" type="password" placeholder="Password" name="password">
                </div>
                <p><?php if (isset($error['null'])) echo $error['null']; ?></p>
                <button type="submit" class="btn" name="dangnhap">Đăng nhập</button>
            </form>
            <div class="mk">
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Nhớ mật khẩu &emsp;&emsp;
                </label>
                <a href="#">Quên mật khẩu?</a>
            </div>
            <div class="sp">
                <h4>Hỗ trợ tư vấn:</h4>
                <p class="phone-htro">Hotline: 0987654321</p>
                <p class="email-htro">Email: lxc@gmail.com</p>
            </div>
        </div>
        <!--end--login-->

        <div class="gt">
            <h4>Trường THPT chuyên Đại học Vinh</h4>
            <img class="img-gt" src="img/bg_login.jpg" alt="">
        </div>
        <!--end--gt-->

    </div>
</body>

</html>