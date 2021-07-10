<?php
	include("connect.php");
/*--Thông tin cá nhân------------*/ 
    $sql = "SELECT * FROM hocsinh hs INNER JOIN khoahoc kh ON hs.id_khoahoc = kh.id_khoahoc INNER JOIN phancong_lh pclh ON hs.mahs = pclh.mahs INNER JOIN phancong_cn pccn ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN lop l ON pccn.malh = l.malh INNER JOIN namhoc nh ON nh.id_namhoc = pccn.id_namhoc
        WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND hs.mahs = ".$_SESSION['user_hs']."
                        ";
    $hoso = $conn->query($sql);
/*--lớp học-----------*/
    $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs INNER JOIN namhoc nh ON nh.id_namhoc = pccn.id_namhoc
        WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND l.malh = (SELECT pccn.malh FROM phancong_lh pclh INNER JOIN phancong_cn pccn ON pclh.id_pc_cn = pccn.id_pc_cn WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND pclh.mahs = ".$_SESSION['user_hs'].") ";
    $dl_lop = $conn->query($sql);
    $sql = "SELECT * FROM phancong_cn pccn INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN giaovien gv ON gv.magv = pccn.magv
        WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND pclh.mahs = ".$_SESSION['user_hs']."";
    $gv_cn = $conn->query($sql);
/*--môn học-----------*/
    $sql = "SELECT cngv.magv, gv.*, nh.namhoc, mh.*, l.* FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh INNER JOIN giaovien gv ON gv.magv = cngv.magv  INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn WHERE pc.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong) AND pccn.id_namhoc = pc.id_namhoc AND pclh.mahs = ".$_SESSION['user_hs']."
                                                ";
    $dl_mon = $conn->query($sql);
/*--Học liệu-----------*/
    $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN hoclieu hl ON hl.mapc = pc.mapc INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn
    WHERE pc.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong) AND pccn.id_namhoc = pc.id_namhoc AND  pclh.mahs = ".$_SESSION['user_hs']."
                                                ";
    $dl_hoclieu = $conn->query($sql);
?>
