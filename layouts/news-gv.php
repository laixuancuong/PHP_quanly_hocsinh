            <div class="news-main">
                <div class="navbar-news">
                    <a href="#news">Tin tức</a>
                </div>
                <div class="news">
                    <table class="list-news">
                        <?php 
                            $sql = "SELECT * FROM news ORDER BY id_news DESC LIMIT 10";
                            $dl_news = $conn->query($sql);
                            foreach($dl_news as $row){
                            ?>
                        <tr>
                            <td>
                                <a href="/qlhs/gv/tintuc.php?id=<?php echo $row['id_news'];?>" style="padding-left: 10px;"><i class="fa fa-question-circle" aria-hidden="true"
                                        style="margin-right: 10px"></i></a>
                            </td>
                            <td>
                                <a href="/qlhs/gv/tintuc.php?id=<?php echo $row['id_news'];?>">
                                    <p style="padding-top: 2px;"> <?php echo" ".$row['nd_chinh']." "?>
                                        <br>
                                    <span style="color: #c01; float: right; padding: 2px;"><?php echo" ".$row['ngay_dang']." "?><span></p>
                                </a>
                            </td>
                        </tr>
                                <?php 
                                    }
                                ?>
                    </table>
                </div>
            </div>