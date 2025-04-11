<?php

namespace Components;

require_once __DIR__."/../SessionData/SessionData.php";
require_once __DIR__."/../SessionData/DataModel/AuthorizationData.php";
require_once __DIR__."/AuthorizationMapper.php";
require_once __DIR__."/DataModel/RoleActionMap.php";
require_once __DIR__."/DataModel/Roles/BaseRole.php";
require_once __DIR__."/DataModel/Roles/GuestRole.php";
require_once __DIR__."/DataModel/Roles/AuthorizedRole.php";
require_once __DIR__."/DataModel/Roles/SessionTimeoutRole.php";

use Components\SessionData;
use Components\SessionData\DataModel\AuthorizationData;
use Components\Authorization\AuthorizationMapper;
use Components\Authorization\DataModel\RoleActionMap;
use Components\Authorization\DataModel\Roles\BaseRole;
use Components\Authorization\DataModel\Roles\GuestRole;
use Components\Authorization\DataModel\Roles\AuthorizedRole;
use Components\Authorization\DataModel\Roles\SessionTimeoutRole;

class Authorization
{
    private RoleActionMap $_roleActionMap;

    public function __construct(string $pageFilePath){
        $mapper = new AuthorizationMapper();
        $pageFilePath = realpath($pageFilePath);
        $roleActionMap = $mapper->getRoleActionMap($pageFilePath);

        $this->_roleActionMap = $roleActionMap;
    }

    private function getCurrentUserRole() : BaseRole {
        $authorizationData = SessionData::GetAuthorizationData();

        if (!$authorizationData->IsDataExists) {
            return new GuestRole();
        } elseif ($authorizationData->IsSessionTimeout) {
            return new SessionTimeoutRole();
        } else{
            return new AuthorizedRole();
        }
    }

    public function ExecuteAuthorization(): void{
        $role = $this->getCurrentUserRole();
        $this->_roleActionMap->ExecuteRoleAction($role);
    }

    public function SetAuthorized(int $userId): void
    {
        SessionData::GetAuthorizationData()->UserId = $userId;
    }
}