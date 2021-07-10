<!-- đặt tên biến -->
<?php 
    /*require_once __DIR__. "connect.php";*/
    include("connect.php");
    $sql = "SELECT * FROM giaovien ORDER BY magv DESC" ;
    $giaovien = $conn->query($sql);
    $sql = "SELECT * FROM account" ;
    $account = $conn->query($sql);
    $sql = "SELECT * FROM khoi" ;
    $khoi = $conn->query($sql);
    $sql = "SELECT * FROM kyhoc";
    $kyhoc = $conn->query($sql);
    $sql = "SELECT * FROM khoahoc";
    $khoahoc = $conn->query($sql);
    $sql = "SELECT * FROM namhoc ORDER BY id_namhoc DESC";
    $namhoc = $conn->query($sql);
    $sql = "SELECT * FROM monhoc";
    $monhoc = $conn->query($sql);
    $sql = "SELECT * FROM account WHERE username = '".$_SESSION['admin']."'";
    $account_ss  = $conn->query($sql);
    /*---------Kết nối bảng dữ liệu--------*/

    $sql = "SELECT * FROM lop l INNER JOIN khoi k ON k.makhoi = l.makhoi ORDER BY tenlop";
    $lophoc = $conn->query($sql);
    $sql = 'SELECT * FROM hocsinh hs INNER JOIN khoahoc kh ON hs.id_khoahoc = kh.id_khoahoc INNER JOIN namhoc nh ON nh.id_namhoc = kh.id_namhoc ORDER BY hs.mahs DESC';
    $dl_hocsinh = $conn->query($sql);
    $sql = 'SELECT * FROM chucnang_gv cngv INNER JOIN giaovien gv ON gv.magv = cngv.magv INNER JOIN monhoc mh ON mh.mamh = cngv.mamh INNER JOIN khoi k ON k.makhoi = cngv.makhoi ORDER BY cngv.id_cn_gv DESC';
    $dl_cngv = $conn->query($sql);
    $sql = 'SELECT * FROM phancong pc INNER JOIN chucnang_gv cngv ON pc.id_cn_gv = cngv.id_cn_gv INNER JOIN giaovien gv ON gv.magv = cngv.magv INNER JOIN monhoc mh ON mh.mamh = cngv.mamh INNER JOIN khoi k ON k.makhoi = cngv.makhoi INNER JOIN phancong_cn pccn ON pc.id_pc_cn = pccn.id_pc_cn INNER JOIN namhoc nh ON pc.id_namhoc = nh.id_namhoc INNER JOIN lop l ON pccn.malh = l.malh ORDER BY pc.mapc DESC';
    $dl_pcgd = $conn->query($sql);
    $sql = 'SELECT * FROM phancong_cn pccn INNER JOIN giaovien gv ON gv.magv = pccn.magv INNER JOIN lop lh ON lh.malh = pccn.malh INNER JOIN khoi k ON k.makhoi = lh.makhoi INNER JOIN namhoc nh ON pccn.id_namhoc = nh.id_namhoc ORDER BY pccn.id_pc_cn DESC' ;
    $dl_pccn = $conn->query($sql);
    $sql = 'SELECT *  FROM phancong_lh pclh INNER JOIN phancong_cn pccn ON pccn.id_pc_cn = pclh.id_pc_cn INNER JOIN giaovien gv ON gv.magv = pccn.magv INNER JOIN hocsinh hs ON hs.mahs = pclh.mahs INNER JOIN namhoc nh ON pccn.id_namhoc = nh.id_namhoc INNER JOIN lop l ON pccn.malh = l.malh ORDER BY pclh.id_pc_lh DESC';
    $dl_pclh = $conn->query($sql);
    $sql = 'SELECT *  FROM news ns INNER JOIN account ac ON ns.id_account = ac.id_account ORDER BY ns.id_news DESC';
    $dl_ns = $conn->query($sql);
?>