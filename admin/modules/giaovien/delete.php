<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "DELETE FROM giaovien WHERE magv = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>