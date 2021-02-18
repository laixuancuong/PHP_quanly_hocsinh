<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "DELETE FROM hocsinh WHERE mahs = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>