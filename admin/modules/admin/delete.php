<?php
    	include("../../libraries/connect.php");
        $sql_xoa = "DELETE FROM account WHERE id_account = '".$_GET['id']."'";
    	$conn->query($sql_xoa);
    	header("Location: index.php");

?>