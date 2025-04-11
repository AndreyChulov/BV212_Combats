<?php

namespace Components\SessionData\DataModel\Pages;

require_once __DIR__ . "/../../BaseSessionData.php";

use Components\SessionData\BaseSessionData;

/***
 * @property string $Message {get; set}
 */
class IndexPageData extends BaseSessionData
{
    public function __construct()
    {
        parent::__construct("IndexPageData");
    }

    //public string $Message {get => $this->Message; set (string $value) => $this->Message = $value;}
}