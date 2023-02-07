<?php require('partials/head.php'); ?>

    <div class="top-right home">
        <?php require('partials/nav_login.php'); ?>
    </div>

<div class="note full-height">
        <?php
        //從資料庫中撈留言紀錄並顯示
        foreach ($result as $row_result) {
//    dd($fin);
            echo "<br>Visitor Name：" . $row_result['name'];
            echo "<br>Subject：" . $row_result['subject'];
            echo "<br>Content：" . nl2br($row_result['content']) . "<br>";
            $no = $row_result['no'];
            $name = $row_result['name'];
//            if ($name  or $name == 'admin') {
//                echo "<table>";
//                echo "<form class='mt-6' method='POST' action='/boards/edit_show'>";
//                echo "<td align='right' colspan='2'  style='background: #FFF;'>";
//                echo "<input type='hidden' name='no' value='$no'>";
//                echo "<input type='hidden' name='name' value='$name'>";
//                echo "<button class='text-sm text-red-500'>Edit message content</button>";
//                echo "</form>";
//                echo "</td>";
//                echo "<td>";
//                echo "<form class='mt-6' method='POST' action='/boards/delete'>";
//                echo "<input type='hidden' name='action' value='delete'>";
//                echo "<input type='hidden' name='no' value='$no'>";
//                echo "<input type='hidden' name='name' value='$name'>";
//                echo "<button class='text-sm text-red-500'>Delete the message</button>";
//                echo "</form>";
//                echo "</td>";
//                echo "</table>";
//            }
            echo "Time：" . $row_result['time'] . "<br>";
            echo "<hr>";
        }
    ?>

<!--            分頁管理-->
            <table border="0" align="center">
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


