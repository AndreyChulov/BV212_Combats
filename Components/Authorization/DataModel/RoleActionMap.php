<?php

namespace Components\Authorization\DataModel;

require_once __DIR__."/Actions/BaseAction.php";
require_once __DIR__."/Roles/BaseRole.php";
require_once __DIR__."/Roles/AuthorizedRole.php";
require_once __DIR__."/Roles/GuestRole.php";
require_once __DIR__."/Roles/SessionTimeoutRole.php";

use Components\Authorization\DataModel\Actions\BaseAction;
use Components\Authorization\DataModel\Roles\BaseRole;
use Components\Authorization\DataModel\Roles\AuthorizedRole;
use Components\Authorization\DataModel\Roles\GuestRole;
use Components\Authorization\DataModel\Roles\SessionTimeoutRole;

class RoleActionMap
{

    private BaseAction $_authorizedAction;
    private BaseAction $_guestAction;
    private BaseAction $_sessionTimeoutAction;

    public function __construct(BaseAction $authorizedAction, BaseAction $guestAction, BaseAction $sessionTimeoutAction){
        $this->_authorizedAction = $authorizedAction;
        $this->_guestAction = $guestAction;
        $this->_sessionTimeoutAction = $sessionTimeoutAction;
    }

    public function ExecuteRoleAction(BaseRole $role): void{
        (match (get_class($role)) {
            SessionTimeoutRole::class => $this->_sessionTimeoutAction,
            GuestRole::class => $this->_guestAction,
            AuthorizedRole::class => $this->_authorizedAction,
        })->ExecuteAction();
    }
}