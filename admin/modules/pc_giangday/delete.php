<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "DELETE FROM phancong WHERE mapc = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>