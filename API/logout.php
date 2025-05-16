<?php

session_start();

require_once __DIR__ . '/../Components/SessionData/SessionData.php';

use Components\SessionData;

$authorizationData = SessionData::GetAuthorizationData();
$authorizationData->ClearData();

$loginApiData = SessionData::getLoginApiData();
$loginApiData->ClearData();



header("Location:/", true, 302);
exit();
