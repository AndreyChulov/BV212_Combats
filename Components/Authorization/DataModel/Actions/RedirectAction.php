<?php

namespace Components\Authorization\DataModel\Actions;

require_once __DIR__."/BaseAction.php";

use Components\Authorization\DataModel\Actions\BaseAction;

class RedirectAction extends BaseAction
{
    private string $_redirectUrl;

    public function __construct(string $redirectUrl)
    {
        $this->_redirectUrl = $redirectUrl;
    }

    public function ExecuteAction(): void
    {
        session_commit();
        header("Location:".$this->_redirectUrl, true, 302);
        exit();
    }
}