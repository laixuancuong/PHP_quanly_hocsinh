<?php
	/*$mahl=$_GET['mahl'];
	$hl = mysqli_query($conn,"SELECT * FROM hoclieu WHERE mahl =".$mahl);
	foreach($hl as $row ){
	$nameFile = "/qlhs/libs/".$row['file_kem']."";
	}
	$FileExtension = explode(".",$nameFile)[count(explode(".",$nameFile))-1];
	$file_url = $_SERVER['DOCUMENT_ROOT'].'/downloadfile/files/'.$nameFile;
	header('Content-Type: application/octet-stream');
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-disposition: attachment; filename=file-".md5(rand(0,1000)).".".$FileExtension); 
	readfile($file_url);*/
	$fname= $_GET['file_kem'];
	$file=fopen('qlhs/libs/'.$fname, "rb");
	header("Content-Type:application/octet-stream");
	header("Content-Transfer-Encoding: Binary");
	header("content-Disposition: attachment; filename=" .$fname);
	fpassthru($file);
?>