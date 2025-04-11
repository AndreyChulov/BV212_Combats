<?php

namespace Components\Authorization;

require_once __DIR__ . "/DataModel/Actions/HtmlErrorAction.php";
require_once __DIR__ . "/DataModel/Actions/PassAction.php";
require_once __DIR__ . "/DataModel/Actions/RedirectAction.php";
require_once __DIR__ . "/DataModel/RoleActionMap.php";

use Components\Authorization\DataModel\Actions\HtmlErrorAction;
use Components\Authorization\DataModel\Actions\PassAction;
use Components\Authorization\DataModel\Actions\RedirectAction;
use Components\Authorization\DataModel\RoleActionMap;

class AuthorizationMapper
{
    private array $_pageRoleActionMap = [];

    public function __construct()
    {
        $this->ConstructPageRoleActionMap();
    }

    private function ConstructPageRoleActionMap() : void
    {
        $this->_pageRoleActionMap = [
            realpath(__DIR__."/../../index.php") => new RoleActionMap(
                new RedirectAction("/lobby.php"), new PassAction(), new HtmlErrorAction(403)),
            realpath(__DIR__."/../../lobby.php") => new RoleActionMap(
                new PassAction(), new RedirectAction("/"), new HtmlErrorAction(403)),
            realpath(__DIR__."/../../auth.php") => new RoleActionMap(
                new HtmlErrorAction(403), new HtmlErrorAction(403), new HtmlErrorAction(403)),
            realpath(__DIR__."/../../API/login.php") => new RoleActionMap(
                new HtmlErrorAction(503), new PassAction(), new PassAction()),
        ];
    }

    public function GetRoleActionMap(string $realPathToPage) : RoleActionMap{
        return $this->_pageRoleActionMap[$realPathToPage];
    }
}