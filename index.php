<?php
session_start();
#session_destroy();

require_once __DIR__."/Components/UniversalForm/UniversalForm.php";
require_once __DIR__."/Components/UniversalForm/IUniversalFormPreset.php";
require_once __DIR__."/Components/UniversalForm/Presets/LoginFormPreset.php";
require_once __DIR__."/Components/UniversalForm/Presets/ForgotPasswordFormPreset.php";
require_once __DIR__."/Components/UniversalForm/Presets/SignUpFormPreset.php";
require_once __DIR__."/Components/SessionData/DataModel/Api/LoginApiData.php";
require_once __DIR__."/Components/SessionData/DataModel/Pages/IndexPageData.php";
require_once __DIR__."/Components/Authorization/Authorization.php";

use Components\Authorization;
use Components\Presets\ForgotPasswordFormPreset;
use Components\Presets\LoginFormPreset;
use Components\Presets\SignUpFormPreset;
use Components\SessionData\DataModel\Api\LoginApiData;
use Components\SessionData\DataModel\Pages\IndexPageData;
use Components\UniversalForm;

$authorization = new Authorization(__FILE__);
$authorization->ExecuteAuthorization();

$indexPageData = new IndexPageData();
$indexPageData -> Message = "sdfsdsf";
$loginApiData = new LoginApiData();

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
        <dialog>
            <b><?php echo $loginApiData->Message ?></b>
            <button autofocus>Закрыть</button>
        </dialog>
        <script language="JavaScript">
            let loginData = `<?php print_r($loginApiData) ?>`
            const dialog = document.querySelector("dialog");
            dialog.showModal();
            //const showButton = document.querySelector("dialog + button");
            const closeButton = document.querySelector("dialog button");

            // "Show the dialog" button opens the dialog modally
            // showButton.addEventListener("click", () => {
            //     dialog.showModal();
            // });

            // "Close" button closes the dialog
             closeButton.addEventListener("click", () => {
                 dialog.close();
             });
        </script>
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
