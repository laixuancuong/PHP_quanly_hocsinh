<?php
    $conn = new mysqli("localhost", "root", "", "qlhocsinh") or die("kết nối thất bại");
    mysqli_set_charset($conn,"utf8");

    $sql = "SELECT * FROM giaovien" ;
    $giaovien = $conn->query($sql);
    $sql = "SELECT * FROM account" ;
    $account = $conn->query($sql);
    $sql = "SELECT * FROM khoi" ;
    $khoi = $conn->query($sql);
    $sql = "SELECT * FROM kyhoc kh INNER JOIN namhoc nh ON nh.id_namhoc = kh.id_namhoc ORDER BY id_kyhoc DESC";
    $kyhoc = $conn->query($sql);
    $sql = "SELECT * FROM khoahoc";
    $khoahoc = $conn->query($sql);
    $sql = "SELECT * FROM namhoc ORDER BY id_namhoc DESC";
    $namhoc = $conn->query($sql);
    $sql = "SELECT * FROM monhoc";
    $monhoc = $conn->query($sql);

    $sql = 'SELECT * FROM hocsinh hs INNER JOIN khoahoc kh ON hs.id_khoahoc = kh.id_khoahoc INNER JOIN namhoc nh ON nh.id_namhoc = kh.id_namhoc';
    $dl_hocsinh = $conn->query($sql);
?>