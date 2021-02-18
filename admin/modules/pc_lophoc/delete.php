<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "DELETE FROM phancong_lh WHERE id_pc_lh = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>