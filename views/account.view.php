<?php require('partials/head.php'); ?>

    <nav>
        <div class="top-right home">
            <?php require('partials/nav_login.php'); ?>
        </div>
    </nav>

<!--刪除帳號示警-->
<script>
    function deleteConfirm() {
        return window.confirm("確定要刪除這個帳號？");
    }
</script>

<!--帳號管理畫面 -->
<div id="login" style="width: 80%;margin:20px  auto; border: 1px #eee solid">
    <fieldset>
        <legend><span style="font-size: xx-large; "><strong>帳號管理</strong></legend>
        <!--        <a href="signup.php"><input type='button' value='新增帳號' /></a>-->
        <!--更新及刪除帳號-->
        <form id="account" name="account" method="POST"  action="/accounts/edit" >
            <table style="margin: 30px auto; width: 80%; text-align:center ">
                <tr>
                    <th style="width: 40%; background:#f6b9b9;  padding: 0 10px;">帳號</th>
                    <th style="width: 50%; background:#fab4b4;  padding: 0 10px;">身份權限</th>
                    <th colspan="4" style="width: 10%; background:#f6b2b2;  padding: 0 10px;">動作</th>
                </tr>

                <?php
                    foreach($result as $row_result){
                        echo "<tr>";
                        echo "<td>".$row_result["name"]."</td>";
                        switch($row_result["level"]){
                            case "2";
                                echo "<td>"."版面管理員"."</td>";
                                break;
                            case "1";
                                echo "<td>"."一般會員"."</td>";
                                break;
                            case "0";
                                echo "<td>"."新進會員"."</td>";
                                break;
                        }

                        echo "<form id='user' name='user' method='POST'  action='/accounts/edit_show'>";
                        echo "<td align='right' colspan='2'  style='background: #FFF;'>";
                        echo "<input name='id' type='hidden' value='{$row_result['id']}'>";
                        echo "<a href='/accounts/edit_show?id=".$row_result['id']."'>";
                        echo "<input type='submit' name='button' id='button' value='更新'>";
                        echo "</a>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form id='user' name='user' method='POST'  action='/accounts/delete'>";
                        echo "<input name='id' type='hidden' value='{$row_result['id']}'>";
                        echo "<a href='/accounts/delete?id=".$row_result['id']."'>";
                        echo "<input type='hidden' name='action' value='delete' >";
                        echo "<input type='submit' name='button2' id='button2' value='刪除' onclick='return deleteConfirm()'>";
                        echo "</a>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
<!--            分頁管理-->
            <table border="0" align="center">
                <tr>
                    <?php
                        if($num_pages > 1){
                            echo '<td><a href="/accounts?page=1"><</a></td>';
                            echo '<td><a href="/accounts?page='.$num_pages.'-1"></td>';
                        }
                    ?>

                    <td>
                        <?php
                            for($i=1;$i<=$total_pages;$i++) {
                                if($i == $num_pages){
                                    echo $i."";
                                }else{
                                    echo '<a href="/accounts?page='.$i.'">'.$i.'</a>';
                                }
                            }
                        ?>

                        <?php
                            if($num_pages < $total_pages){
                                echo '<td><a href="/accounts?page='.$num_pages.'+1"></a></td>';
                                echo '<td><a href="/accounts?page='.$total_pages.'">></a></td>';
                            }
                        ?>
                    </td>
                </tr>
            </table>
<!--            分頁管理結束-->
        </form>
    </fieldset>
</div>
