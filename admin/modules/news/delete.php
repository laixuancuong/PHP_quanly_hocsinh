<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "delete from news where id_news = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>