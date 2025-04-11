<?php

namespace Components\SessionData\DataModel;

require_once __DIR__."/../BaseSessionData.php";

use Components\SessionData\BaseSessionData;

/***
 * @property int $UserId {get; set}
 */
class AuthorizationData extends BaseSessionData
{
    public function __construct()
    {
        parent::__construct(AuthorizationData::class);
    }
}