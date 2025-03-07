<?php

require_once __DIR__."/Components/UniversalForm/UniversalForm.php";
require_once __DIR__."/Components/UniversalForm/IUniversalFormPreset.php";
require_once __DIR__."/Components/UniversalForm/Presets/LoginFormPreset.php";
require_once __DIR__."/Components/UniversalForm/Presets/ForgotPasswordFormPreset.php";
require_once __DIR__."/Components/UniversalForm/Presets/SignUpFormPreset.php";

use Components\UniversalForm;
use Components\Presets\LoginFormPreset;
use Components\Presets\SignUpFormPreset;
use Components\Presets\ForgotPasswordFormPreset;

$loginFormPreset = new LoginFormPreset();
$signUpFormPreset = new SignUpFormPreset();
$forgotFormPreset = new ForgotPasswordFormPreset();
$loginForm = new UniversalForm($loginFormPreset);
$signUpForm = new UniversalForm($signUpFormPreset);
$forgotForm = new UniversalForm($forgotFormPreset);

?>
<html lang="En-En">
    <head>
        <meta charset="UTF-8" >
        <title>Combats</title>
        <link rel="icon" href="Images/icon.svg">
        <link rel="stylesheet" href="CSS/index.css">
        <?php
            /*require '';
            require_once '';
            include '';
            include_once '';*/
            //include './Components/login-form/index_head.inc';
            $loginForm->EchoCss();
        ?>
    </head>
    <body>
        <div class="form-container flex-ltr form-change-animation">
            <?php //phpinfo()
            //include './Components/login-form/index_body.inc';
            $signUpForm->EchoBody();
            $loginForm->EchoBody();
            $forgotForm->EchoBody();

            $loginForm->EchoScripts();
            ?>
        </div>
     </body>
</html>
