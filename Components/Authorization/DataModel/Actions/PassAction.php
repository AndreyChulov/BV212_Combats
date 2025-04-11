<?php

namespace Components\Authorization\DataModel\Actions;

require_once __DIR__."/BaseAction.php";

use Components\Authorization\DataModel\Actions\BaseAction;

class PassAction extends BaseAction
{

    public function ExecuteAction(): void
    {
        // INFO: Проверка прошла, со стороны авторизации делать ничего не нужно
    }
}