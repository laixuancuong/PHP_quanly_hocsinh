<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "delete from monhoc where mamh = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");
?>