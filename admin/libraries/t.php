
                    /*if ($dk_items['id_namhoc'] == $id_namhoc && $dk_items['id_cn_gv'] == $id_cn_gv && $dk_items['malh'] == $malh)
                    {   
                        echo "Chức năng này đã tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                    }
                    else{
                        $insert =mysqli_query($conn,"INSERT INTO `phancong` (`mapc`, `id_namhoc`, `id_cn_gv`, `malh`) VALUES (NULL,'".$id_namhoc."','".$id_cn_gv."','".$malh."')");
                        $dk_pc = mysqli_query($conn,"SELECT mapc FROM phancong WHERE mapc = (SELECT MAX(mapc) FROM phancong)");
                        $dk_mapc  = mysqli_fetch_array($dk_pc);
                        header("Location: ../modules/pc_giangday/index.php");
                    }*/
                    $array1 = array($dk_items['id_namhoc'], $dk_items['id_cn_gv'], $dk_items['malh']);
                $array2 = array($id_namhoc, $id_cn_gv, $malh);
                if (NULL == (array_diff($array1, $array2)))
                {
                     $insert =mysqli_query($conn,"INSERT INTO `phancong` (`mapc`, `id_namhoc`, `id_cn_gv`, `malh`) VALUES (NULL,'".$id_namhoc."','".$id_cn_gv."','".$malh."')");
                        $dk_pc = mysqli_query($conn,"SELECT mapc FROM phancong WHERE mapc = (SELECT MAX(mapc) FROM phancong)");
                        $dk_mapc  = mysqli_fetch_array($dk_pc);
                        header("Location: ../modules/pc_giangday/index.php");
                }
                else{
                    echo "Chức năng này đã tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                }