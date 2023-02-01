<?php require('partials/head.php'); ?>

<nav>
    <div class="top-right home">
        <?php require('partials/nav_login.php'); ?>
    </div>
</nav>

<div id="login" style="width: 80%;margin:20px  auto; border: 1px #eee solid">
    <fieldset>
        <legend><span style="font-size: xx-large; "><strong>編輯帳號</strong></legend>
        <form id="register" name="register" method="post" action="/accounts/edit" >
            <table style="margin: 30px auto; width: 80%;">
                <tr>
                    <td colspan="2"><h2>編輯帳號</h2></td>
                </tr>
                <tr>
                    <td style="width: 50%; background:#eee;  padding: 0 10px;">Step1:登入帳號 </td>
                    <td><label for="name"></label><input type="text" name="name" id="name" style="width: 200px;" value="<?php echo $edit_name;?>"></td>
                </tr>
                <tr>
                    <td style="width: 50%; background:#eee;  padding: 0 10px;">Step2:登入密碼 </td>
                    <td><label for="password"></label><input type="password" name="password" id="password" style="width: 200px;" value="<?php echo $edit_password;?>"></td>
                </tr>
                <tr>
                    <td style="width: 50%; background:#eee;  padding: 0 10px;">Step3:再次確認密碼 </td>
                    <td><label for="re-password"></label><input type="password" name="re-password" id="re-password" style="width: 200px;" value="<?php echo $edit_password;?>"></td>
                </tr>
                <tr>
                    <td style="width: 50%; background:#eee;  padding: 0 10px;">Step4:權限等級 </td>
                    <td>
                        <label>
                            <select name='level'>
                                <option <?php if($edit_level=='0'){echo "selected";} ?> value='0'>新進會員</option>
                                <option <?php if($edit_level=='1'){echo "selected";} ?> value='1'>一般會員</option>
                                <option <?php if($edit_level=='2'){echo "selected";} ?> value='2'>超級管理員</option>
                            </select>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input name='id' type='hidden' value="<?= $edit_id;?>">
                        <input name='name' type='hidden' value="<?= $edit_name;?>">
                        <input type="hidden" name="action" value='edit'>
                        <input type="submit" name="Submit" value="  更新  ">
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#name').on('blur', function(e){
                if($('#name').val() === ''){
                    window.alert('需輸入使用者名稱');
                    return false;
                }
            })
            $('#re-password').on('blur', function(e){
                if($('#password').val() !== $('#re-password').val()){
                    window.alert('兩次輸入的密碼不符合');
                    return false;
                }
            }); // End of submit
        });//End of ready
    </script>



