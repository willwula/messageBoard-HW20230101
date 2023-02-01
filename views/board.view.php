<?php require('partials/head.php'); ?>

    <nav>
        <div class="top-right home">
            <?php require('partials/nav_login.php'); ?>
        </div>
    </nav>
    <div class="content">
                <div class="m-b-md">
                    <form name="form1" action="/boards/create" method="post">
                        <input type="hidden" name="name" value="<?= $name ?>">
                        	<p><strong><?="Hi, " . $name?></strong></p>
                        	<p>SUBJECT</p>
                        	<p><label>
                                    <input type="text" name="subject">
                                </label></p>
                        	<p>CONTENT</p>
                        	<p><label>
                                    <textarea style="font-family: 'Nunito', sans-serif; font-size:20px; width:550px;height:100px;" name="content"></textarea>
                                </label></p>
                        <?php if (isset($errors['subject'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['subject'] ?></p>
                        <?php endif; ?>
                        <?php if (isset($errors['content'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['content'] ?></p>
                        <?php endif; ?>
                        	<p><input type="submit" name="submit" value="SEND">
                    <style>
                        input {padding:5px 15px; background:#FFCCCC; border:0 none;
                        cursor:pointer;
                        -webkit-border-radius: 5px;
                        border-radius: 5px; }
                    </style>
                        <input type="reset" name="Reset" value="RESET">
                    <style>
                        input {
                            padding:5px 15px;
                            background:#FFCCCC;
                            border:0 none;f
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: 'Nunito', sans-serif;
                            font-size: 19px;
                        }
                    </style>
                    </form>
                </div>



