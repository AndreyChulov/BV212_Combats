<?php

namespace Components\Authorization\DataModel\Actions;

require_once __DIR__."/BaseAction.php";

use Components\Authorization\DataModel\Actions\BaseAction;

class HtmlErrorAction extends BaseAction
{
    private int $_responseCode;

    public function __construct(int $responseCode)
    {

        $this->_responseCode = $responseCode;
    }


    public function ExecuteAction(): void
    {
        http_response_code($this->_responseCode);
    }
}