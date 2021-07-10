
<?php session_start(); 
 
if (isset($_SESSION['user_gv'])){
    unset($_SESSION['user_gv']); // xóa session login
	header("location: /qlhs/gv/index.php");
}
else
{
	header("location: /qlhs/gv/index.php");
}
?>