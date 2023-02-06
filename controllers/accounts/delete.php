<?php

use models\User;
authorize(@$_POST["action"]&&$_POST["action"]=="delete");
    $delete = new User();

    $userid = @$_POST['id'];

    $delete->delete($userid);

    header("Location: /accounts");
