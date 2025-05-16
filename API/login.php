<?php
session_start();

require_once __DIR__ . '/../Components/Authorization/Authorization.php';
require_once __DIR__.'/../Components/UniversalForm/UniversalFormData.php';
require_once __DIR__.'/../DBO/DB.php';
require_once __DIR__ . '/../DBO/DataModel/CredentialsRow.php';
require_once __DIR__ . '/../Components/SessionData/DataModel/Api/LoginApiData.php';

use Components\SessionData\DataModel\Api\LoginApiData;
use Components\UniversalForm\UniversalFormData;
use Components\Authorization;
use DBO\DataModel\CredentialsRow;
use DBO\DB;

$authorization = new Authorization(__FILE__);
$authorization->ExecuteAuthorization();

$universalFormData = new UniversalFormData();
$db = new DB();

$names = array_map(fn(CredentialsRow $x):string => $x->UserName, $db->credentialsTable);

//print_r($names);

$loginApiData = new LoginApiData();

/*** @var $userCredentials CredentialsRow */
$userCredentials =
    array_find($db->credentialsTable, fn(CredentialsRow $x):bool => $x->UserName == $universalFormData->UserName);

if (!isset($userCredentials)) {
    $loginApiData->IsLoginSuccess = false;
    $loginApiData->Message = "Такого пользователя не существует";
    header("Location:/", true, 302);
    exit();
}

if ($userCredentials->Password == $universalFormData->Password) {
    $loginApiData->IsLoginSuccess = true;
    $loginApiData->UserName = $universalFormData->UserName;
    $loginApiData->Message = "Аутентификация успешна";
    $authorization->SetAuthorized($userCredentials->Id);
    //session_commit();
    header("Location:/lobby.php", true, 302);
    exit();
} else {
    $loginApiData->IsLoginSuccess = false;
    $loginApiData->UserName = $universalFormData->UserName;
    $loginApiData->Message = "Пароль не верный";
    header("Location:/", true, 302);
    exit();
}

//if ($universalFormData->UserName === $db->credentialsTable->)