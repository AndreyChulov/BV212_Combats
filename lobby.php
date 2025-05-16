<?php
session_start();

require_once __DIR__ . '/Components/Authorization/Authorization.php';

use  Components\Authorization;

$authorization = new Authorization(__FILE__);
$authorization->ExecuteAuthorization();
