<?php
$folder = dirname(__FILE__); // создаем переменную folder и присваиваем ей текущую папку

require_once "$folder/../../Settings.php";
global $ROOT_URL;

$styleResetLink = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css";
                    // создаем переменную styleResetLink содержащую адрес к первому источнику css
$styleLink = "$ROOT_URL/Components/login-form/css/form.css";
                    // создаем переменную styleLink содержащую адрес к второму источнику css
echo '<link rel="stylesheet" href="' . $styleResetLink . '">';
            // выводим на клиентсткую страницу тэг, подключающий reset css
echo '<link rel="stylesheet" href="' . $styleLink . '">';
            // выводим на клиентсткую страницу тэг, подключающий style css
