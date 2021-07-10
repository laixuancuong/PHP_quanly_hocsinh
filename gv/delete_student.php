<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	include("../libs/connect.php");
	$sql_xoa = "DELETE FROM phancong_lh WHERE id_pc_lh = ".$id;
	$conn->query($sql_xoa);
	execute($sql);

	echo 'Xoá sinh viên thành công';
}