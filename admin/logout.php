
<?php session_start(); 
 
if (isset($_SESSION['admin'])){
    unset($_SESSION['admin']); // xóa session login
	header("location: index.php");
}
else
{
	header("location: index.php");
}
?>