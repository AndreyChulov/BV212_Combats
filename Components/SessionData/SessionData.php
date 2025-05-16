<?php

namespace Components;

require_once __DIR__."/DataModel/Api/LoginApiData.php";
require_once __DIR__."/DataModel/Pages/IndexPageData.php";
require_once __DIR__."/DataModel/AuthorizationData.php";

use Components\SessionData\DataModel\Api\LoginApiData;
use Components\SessionData\DataModel\Pages\IndexPageData;
use Components\SessionData\DataModel\AuthorizationData;

class SessionData
{
    private static function ShowSessionData()
    {
        //print_r($_SESSION);
    }

    public static function GetLoginApiData() : LoginApiData{
        self::ShowSessionData();
        return new LoginApiData();
    }

    public static function GetIndexPageData() : IndexPageData{
        self::ShowSessionData();
        return new IndexPageData();
    }

    public static function GetAuthorizationData() : AuthorizationData{
        self::ShowSessionData();
        return new AuthorizationData();
    }
}