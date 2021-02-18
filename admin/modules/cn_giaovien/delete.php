<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "DELETE FROM chucnang_gv WHERE id_cn_gv = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");
?>