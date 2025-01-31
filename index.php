<?php

$indexFolder = dirname(__FILE__);

require_once "$indexFolder/Components/login-form/LoginForm.php";

use Components\LoginForm;

$loginForm = new LoginForm("Combats логин");

?>
<html lang="En-En">
    <head>
        <meta charset="UTF-8" >
        <title>Combats</title>
        <link rel="icon" href="Images/icon.svg">
        <?php
            /*require '';
            require_once '';
            include '';
            include_once '';*/
            //include './Components/login-form/index_head.inc';
            $loginForm->EchoHeader();
        ?>
    </head>
    <body>
        <!--<h1>Hello user!!!</h1>-->
        <?php //phpinfo()
            //include './Components/login-form/index_body.inc';
            $loginForm->EchoBody();
        ?>
    </body>
</html>
