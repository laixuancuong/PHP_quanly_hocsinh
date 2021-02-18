<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "delete from lop where malh = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>