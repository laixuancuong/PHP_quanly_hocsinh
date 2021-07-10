
<?php session_start(); 
 
if (isset($_SESSION['user_hs'])){
    unset($_SESSION['user_hs']); // xóa session login
	header("location: /qlhs/index.php");
}
else
{
	header("location: /qlhs/index.php");
}
?>