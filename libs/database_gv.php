<?php 
    include("connect.php");
/*--Thông tin cá nhân------------*/ 
    $sql = "SELECT * FROM giaovien gv INNER JOIN phancong_cn pccn ON gv.magv = pccn.magv INNER JOIN lop l ON pccn.malh = l.malh
                    WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND gv.magv = ".$_SESSION['user_gv']."
                        ";
    $hoso = $conn->query($sql);
/*--môn giảng dạy---------*/
    $sql = "SELECT * FROM giaovien gv INNER JOIN chucnang_gv cngv ON gv.magv = cngv.magv INNER JOIN khoi k ON k.makhoi = cngv.makhoi INNER JOIN monhoc mh ON cngv.mamh = mh.mamh WHERE gv.magv = ".$_SESSION['user_gv']."
                        ";
    $mon = $conn->query($sql);
	$sql = "SELECT * FROM phancong_ pc INNER JOIN lop l ON l.malh = pc.malh
                    INNER JOIN monhoc mh ON mh.mamh = pc.mamh
                    WHERE pc.magv = ".$_SESSION['user_gv']."
                        ";
    $gv_mon = $conn->query($sql);
    $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh
    WHERE pc.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong) AND  cngv.magv = ".$_SESSION['user_gv']."
                                                ";
    $dl_mon = $conn->query($sql);
/*--lớp chủ nhiệm-----------*/
    $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN phancong_lh pclh ON pclh.id_pc_cn = pccn.id_pc_cn INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs
                    WHERE pccn.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong_cn) AND  pccn.magv = ".$_SESSION['user_gv']." ORDER BY pclh.id_pc_lh DESC
                        ";
    $dl_lop = $conn->query($sql);
    $sql = "SELECT * FROM phancong_cn pccn INNER JOIN lop l ON l.malh = pccn.malh
                    WHERE pccn.magv = ".$_SESSION['user_gv']."
                        ";
    $lop = $conn->query($sql);
    $sql = "SELECT * FROM phancong pc INNER JOIN lop l ON l.malh = pc.malh INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv
    WHERE cngv.magv = ".$_SESSION['user_gv']."
                        ";
    $gv_lop = $conn->query($sql);
/*--Học liệu--------------------*/
    $sql = "SELECT * FROM phancong pc INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pc.id_pc_cn  INNER JOIN lop l ON l.malh = pccn.malh INNER JOIN namhoc nh ON nh.id_namhoc = pc.id_namhoc INNER JOIN chucnang_gv cngv ON cngv.id_cn_gv = pc.id_cn_gv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh INNER JOIN hoclieu hl ON hl.mapc = pc.mapc
    WHERE pc.id_namhoc = (SELECT MAX(id_namhoc) FROM phancong) AND  cngv.magv = ".$_SESSION['user_gv']."
    ORDER BY hl.mahl DESC
                        ";
    $dl_hoclieu = $conn->query($sql);
/*--Điểm--------------------*/
    $sql = "SELECT * FROM chucnang_gv cngv INNER JOIN monhoc mh ON cngv.mamh = mh.mamh INNER JOIN diem_chitiet dct ON dct.mamh = mh.mamh INNER JOIN diem d ON d.id_diem_ct = dct.id_diem_ct INNER JOIN hocsinh hs ON dct.mahs = hs.mahs
    WHERE dct.id_kyhoc = (SELECT MAX(id_kyhoc) FROM diem_chitiet) AND cngv.magv = ".$_SESSION['user_gv']."
                        ";
    $dl_diem = $conn->query($sql);
 ?>