<?php

$username = $_POST["username"];
$password = $_POST["password"];
$isAuthSuccess = false;

if ($username == "root" && $password == "root") {
    $isAuthSuccess = true;
}

?>

<html lang="En">
    <head>
        <title>Combats auth</title>
    </head>
    <body>
        <?php
        if ($isAuthSuccess) {
            echo "Welcome $username. Auth success";
        } else {
            echo "Welcome guest. Auth fail.";
        }?>
    </body>
</html>
