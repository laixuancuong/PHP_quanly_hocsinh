<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "DELETE FROM phancong_cn WHERE id_pc_cn = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>