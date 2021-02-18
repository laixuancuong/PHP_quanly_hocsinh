<?php 
    include("connect.php"); 
    session_start();
?>
<!-- Đăng nhập -->
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
            $error['null'] = "Không được để trống!";
            header('Location: ../gv/login.php');
            
        }
        else
        {
            $sql = "select * from giaovien where magv = '$username' and password = '$password' ";
            $query = mysqli_query($conn,$sql);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows==0) {
                echo 'Tên đăng nhập hoặc mật khẩu không đúng !';
            }
            else
            {
                //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                $_SESSION['user'] = $username;
              
                // chuyển hướng trang web tới một trang index.php
               
                header('Location: ../gv/index.php');
            }
        }
    }

?>
<!-- End - Đăng nhập -->
<!---- Thêm ----->
<?php
    
    if (isset($_POST['addData'])){
        $data['tenlop'] = isset($_POST['tenlop']) ? $_POST['tenlop'] : '';
        $errors = array();
        if (empty($data['tenlop'])){
            $errors['tenlop'] = 'Chưa nhập tên lớp';
        }
        if(!$errors){
            $sql_add = "INSERT INTO `lop` (`malh`, `tenlop`, `magv`, `makhoi`, `sohs`) VALUES (NULL,'".$_POST['tenlop']."','".$_POST['magv']."','".$_POST['makhoi']."','".$_POST['sohs']."')";
            $conn->query($sql_add);
        }
    }
    /*---thêm hs vào lớp---*/
        if (isset($_POST['add-gv_lop'])){
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
                    header("Location: ../gv/lophoc.php");
                }
            }
        }
    /*---thêm tài liệu---*/
       if(isset($_POST['add-gv_hoclieu'])){
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
                                $upload_query = mysqli_query($conn,"INSERT INTO hoclieu (mahl, noidung, mapc, file_kem) VALUES (NULL,N'".$noidung."','".$mapc."',N'".$target_file."') ");
                                $flag = true;
                                header("Location: ../gv/hoclieu.php");

                            } else {
                                echo "File bạn vừa upload gặp sự cố <a href='javascript: history.go(-1)'>Trở lại</a>";
                            }
                        }
       }
?>
<!---- End - Thêm ----->
<!------ Xoá ------------>
<?php
    
    if (isset($_POST['addData'])){
        $data['tenlop'] = isset($_POST['tenlop']) ? $_POST['tenlop'] : '';
        $errors = array();
        if (empty($data['tenlop'])){
                        $errors['tenlop'] = 'Chưa nhập tên lớp';
        }
        if(!$errors){
            $sql_add = "INSERT INTO `lop` (`malh`, `tenlop`, `magv`, `makhoi`, `sohs`) VALUES (NULL,'".$_POST['tenlop']."','".$_POST['magv']."','".$_POST['makhoi']."','".$_POST['sohs']."')";
            $conn->query($sql_add);
        }
    }
?>
<!------ end - Xoá ------------>