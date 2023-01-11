<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>

    <div class="content">
        <div>
            <img src="img/dog2.png" style="display:block; margin-top: 300px;" alt="" >
        </div>
        <div class="m-b-md">
            <form name="login" action="/login" method="post">
                <p>Username : <label>
                        <input type=text name="name">
                    </label></p>
                <p>Password : <label>
                        <input type=password name="password">
                    </label></p>
                <p><input type="submit" name="submit" value="Log in">
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
                            background: #fcffcc;
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

</body>

