<?php
    	include("../libs/connect.php");
    	if (isset($_GET['id_pc_lh'])){
	        $sql_xoa = "DELETE FROM phancong_lh WHERE id_pc_lh = '".$_GET['id_pc_lh']."'";
	    	$conn->query($sql_xoa);
	    	header("Location: lophoc.php");
	    }
	    if (isset($_GET['mahl'])){
	        $sql_xoa = "DELETE FROM hoclieu WHERE mahl = '".$_GET['mahl']."'";
	    	$conn->query($sql_xoa);
	    	header("Location: hoclieu.php");
	    }
?>