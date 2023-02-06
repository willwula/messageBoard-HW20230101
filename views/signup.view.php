<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

    <div class="content">
        <div class="m-b-md">
            <form name="signup" action="/signup/create" method="post">
                <p>Username : <label>
                        <input type=text name="name" placeholder="Name">
                    </label></p>
                <p>Password : <label>
                        <input type=password name="password" placeholder="Password">
                    </label></p>
                <?php if (isset($errors['name'])) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['name'] ?></p>
                <?php endif; ?>
                <?php if (isset($errors['password'])) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
                <?php endif; ?>
                <p><input type="submit" name="submit" value="Sign up">
                    <style>
                        input {padding:5px 15px; background:#ccc; border:0 none;
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px; }
                    </style>
                    <input type="reset" name="Reset" value="Reset">
                    <style>
                        input {
                            padding:5px 15px;
                            background: #eaffcc;
                            border:0 none;
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: 'Nunito', sans-serif;
                            font-size: 19px;
                        }
                    </style>
            </form>
        </div>

</body>

