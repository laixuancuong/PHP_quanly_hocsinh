<!-- Đăng nhập -->
<?php 
    include("connect.php");
    session_start();
?>
<?php
    if(isset($_POST["dangnhap"]))
    {
        $username= $_POST["username"];
        $password = $_POST["password"];
        //lam sach thong tin
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        if ($username == "" || $password =="")
        {
           header('Location: ../index.php');
        }
        else
        {
            $sql = "select * from account where username = '$username' and password = '$password' ";
            $query = mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows==0) {
                echo 'Tên đăng nhập hoặc mật khẩu không đúng !<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                $_SESSION['admin'] = $username;
              
                // chuyển hướng trang web tới một trang index.php
               
                header('Location: ../index.php');
            }
        }
    }

?>
<!-- End - Đăng nhập -->
<!-- Thêm  -->
<?php
    /*---Lớp học---*/
        if (isset($_POST['add-lh'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM lop");
            $dk_items  = mysqli_fetch_array($dk_query);
            
            $tenlop= $_POST['tenlop'];
            $makhoi =$_POST['makhoi'];
            if(!$tenlop)
            {
                
                echo 'Vui lòng nhập tên lớp<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                if ($dk_items['tenlop'] == "$tenlop")
                {
                    echo "Tên lớp đã tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO lop (malh, tenlop, makhoi) VALUE (NULL,'".$tenlop."','".$makhoi."')");
                    header("Location: ../modules/lophoc/index.php");
                }
            }
        }
    /*---Học sinh---*/
        if (isset($_POST['add-hs'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM hocsinh hs INNER JOIN khoahoc kh ON hs.id_khoahoc = kh.id_khoahoc INNER JOIN namhoc nh ON nh.id_namhoc = kh.id_namhoc");
            $dk_items  = mysqli_fetch_array($dk_query);

            $hoten_dem= $_POST['hoten_dem'];
            $ten_hs= $_POST['ten_hs'];
            $matkhau =$_POST['matkhau'];
            $ngaysinh =$_POST['ngaysinh'];
            $diachi =$_POST['diachi'];
            $sodt =$_POST['sodt'];
            $gioitinh =$_POST['gioitinh'];
            $id_khoahoc =$_POST['id_khoahoc'];
            $email =$_POST['email'];
            if($ten_hs == "" || $matkhau =="" || $hoten_dem =="" || $id_khoahoc =="")
            {
                
                echo 'Vui lòng nhập họ tên, mật khẩu và khoá học <a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                if ($dk_items['hoten_dem'] == "$hoten_dem" && $dk_items['ten_hs'] == "$ten_hs" &&$dk_items['id_khoahoc'] == "$id_khoahoc")
                {
                    echo "Học sinh này đã tồn tại trong khoá học. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO `hocsinh` (`mahs`, `hoten_dem`, `ten_hs`, `matkhau`, `ngaysinh`, `gioitinh`, `diachi`, `sodt`, `email`, `id_khoahoc`) VALUES (NULL,'".$hoten_dem."','".$ten_hs."','".$matkhau."','".$ngaysinh."','".$gioitinh."','".$diachi."','".$sodt."','".$email."','".$id_khoahoc."')");
                    header("Location: ../modules/hocsinh/index.php");
                }
            }
        }
        /*---Giáo viên---*/
        if (isset($_POST['add-gv'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM giaovien");
            $dk_items  = mysqli_fetch_array($dk_query);

            $hoten_dem= $_POST['hoten_dem'];
            $ten_gv= $_POST['ten_gv'];
            $password =$_POST['password'];
            $ngaysinh =$_POST['ngaysinh'];
            $diachi =$_POST['diachi'];
            $sodt =$_POST['sodt'];
            $gioitinh =$_POST['gioitinh'];
            $id_khoahoc =$_POST['id_khoahoc'];
            $email =$_POST['email'];
            if($ten_gv == "" || $password =="" || $hoten_dem =="")
            {
                
                echo 'Vui lòng nhập họ tên, mật khẩu<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                if ($dk_items['hoten_dem'] == "$hoten_dem" && $dk_items['ten_gv'] == "$ten_gv")
                {
                    echo "Giáo viên này đã tồn tại trong khoá học. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO `giaovien` (`magv`, `hoten_dem`, `ten_gv`, `password`, `gioitinh`, `diachi`, `sodt`, `email`) VALUES (NULL,'".$hoten_dem."','".$ten_gv."','".$password."','".$gioitinh."','".$diachi."','".$sodt."','".$email."')");
                    header("Location: ../modules/giaovien/index.php");
                }
            }
        }
        /*---admin---*/
        if (isset($_POST['add-ad'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM account");
            $dk_items  = mysqli_fetch_array($dk_query);

            $username= $_POST['username'];
            $hoten= $_POST['hoten'];
            $password =$_POST['password'];
            $ngaysinh =$_POST['ngaysinh'];
            $dienthoai =$_POST['dienthoai'];
            if($hoten == "" || $password =="" || $username =="")
            {
                
                echo 'Vui lòng nhập tài khoản, họ tên, mật khẩu<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                if ($dk_items['username'] == "$username")
                {
                    echo "Tài khoản này đã tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO `account` (`id_account`, `username`, `hoten`, `password`, `dienthoai`) VALUES (NULL,'".$username."','".$hoten."','".$password."','".$dienthoai."')");
                    header("Location: ../modules/admin/index.php");
                }
            }
        }
        /*---chức năng giáo viên---*/
        if (isset($_POST['add-cngv'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM chucnang_gv");
            $dk_items  = mysqli_fetch_array($dk_query);

            $magv= $_POST['magv'];
            $mamh= $_POST['mamh'];
            $makhoi =$_POST['makhoi'];
            if($magv == "" || $makhoi =="" || $mamh =="")
            {
                
                echo 'Vui lòng nhập đầy đủ thông tin<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                if ($dk_items['magv'] == "$magv" && $dk_items['mamh'] == "$mamh" && $dk_items['makhoi'] == "$makhoi")
                {
                    echo "Chức năng này đã tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO `chucnang_gv` (`id_cn_gv`, `magv`, `mamh`, `makhoi`) VALUES (NULL,'".$magv."','".$mamh."','".$makhoi."')");
                    header("Location: ../modules/cn_giaovien/index.php");
                }
            }
        }
        /*---Phân công giảng dạy---*/
        if (isset($_POST['add-pcgd'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM phancong");
            $dk_items  = mysqli_fetch_array($dk_query);
            
            $id_namhoc= $_POST['id_namhoc'];
            $id_cn_gv= $_POST['id_cn_gv'];
            $malh =$_POST['malh'];
            if($id_namhoc == "" || $malh =="" || $id_cn_gv =="")
            {
                
                echo 'Vui lòng nhập đầy đủ thông tin<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {   
                if ($dk_items['id_namhoc'] == $id_namhoc && $dk_items['id_cn_gv'] == $id_cn_gv && $dk_items['malh'] == $malh)
                {   
                    echo "Chức năng này đã tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO `phancong` (`mapc`, `id_namhoc`, `id_cn_gv`, `malh`) VALUES (NULL,'".$id_namhoc."','".$id_cn_gv."','".$malh."')");
                    $dk_pc = mysqli_query($conn,"SELECT mapc FROM phancong WHERE mapc = (SELECT MAX(mapc) FROM phancong)");
                    $dk_mapc  = mysqli_fetch_array($dk_pc);
                    header("Location: ../modules/pc_giangday/index.php");
                }
            }
        }
        /*---Phân công chủ nhiệm---*/
        if (isset($_POST['add-pccn'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM phancong_cn");
            $dk_items  = mysqli_fetch_array($dk_query);

            $magv= $_POST['magv'];
            $id_namhoc= $_POST['id_namhoc'];
            $malh =$_POST['malh'];
            if($magv == "" || $malh =="" || $id_namhoc =="")
            {
                
                echo 'Vui lòng nhập đầy đủ thông tin<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                if ($dk_items['magv'] == "$magv" && $dk_items['id_namhoc'] == "$id_namhoc" || $dk_items['malh'] == "$malh" && $dk_items['id_namhoc'] == "$id_namhoc")
                {
                    echo "Lớp đã có chủ nhiệm hoặc giáo viên này đã tồn tại trong năm học này. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO `phancong_cn` (`id_pc_cn`, `magv`, `id_namhoc`, `malh`) VALUES (NULL,'".$magv."','".$id_namhoc."','".$malh."')");
                    header("Location: ../modules/pc_chunhiem/index.php");
                }
            }
        }
        /*---Phân công lớp học---*/
        if (isset($_POST['add-pclh'])){
            $dk_query = mysqli_query($conn,"SELECT * FROM phancong_lh");
            $dk_items  = mysqli_fetch_array($dk_query);

            $mahs= $_POST['mahs'];
            $id_pc_cn= $_POST['id_pc_cn'];
            if($mahs == "" || $id_pc_cn =="")
            {
                
                echo 'Vui lòng nhập đầy đủ thông tin<a href="javascript: history.go(-1)">Trở lại</a>';
                exit;
            }
            else
            {
                if ($dk_items['mahs'] == "$mahs" && $dk_items['id_pc_cn'] == "$id_pc_cn")
                {
                    echo "Học sinh đã ở trong lớp này. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                else{
                    $insert =mysqli_query($conn,"INSERT INTO `phancong_lh` (`id_pc_lh`, `mahs`, `id_pc_cn`) VALUES (NULL,'".$mahs."','".$id_pc_cn."')");
                    header("Location: ../modules/pc_lophoc/index.php");
                }
            }
        }
?>