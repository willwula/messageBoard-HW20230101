<?php require('partials/head.php'); ?>

    <div class="top-right home">
        <?php require('partials/nav_login.php'); ?>
    </div>

<div class="note full-height">
        <?php
        //從資料庫中撈留言紀錄並顯示
        foreach ($result as $row_result) {
            echo "<br>Visitor Name：" . $row_result['name'];
            echo "<br>Subject：" . $row_result['subject'];
            echo "<br>";
//            echo "<br>Content：" . nl2br($row_result['content']) . "<br>";
            $no = $row_result['no'];
            $name = $row_result['name'];
            echo "Time：" . $row_result['time'] . "<br>";
            echo "<hr>";
        }
    ?>

<!--            分頁管理-->
            <table>
                <tr>
                    <?php
                        if($num_pages > 1){
                            echo '<td><a href="/show?page=1"><</a></td>';
                            echo '<td><a href="/show?page='.$num_pages.'-1"></td>';
                        }
                    ?>
    <td>
        <?php
        for($i=1;$i<=$total_pages;$i++) {
            if($i == $num_pages){
                echo $i."";
            }else{
                echo '<a href="/show?page='.$i.'">'.$i.'</a>';
            }
        }
        ?>
        <?php
        if($num_pages < $total_pages){
            echo '<td><a href="/show?page='.$num_pages.'+1"></a></td>';
            echo '<td><a href="/show?page='.$total_pages.'">></a></td>';
        }
        ?>
    </td>
    </tr>
    </table>
</div>


