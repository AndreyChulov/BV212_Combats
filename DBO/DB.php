<?php

namespace DBO;

require_once __DIR__ . '/DataModel/CredentialsRow.php';

use DBO\DataModel\CredentialsRow;
use function Sodium\add;

class DB
{
    /**
     * @var array|CredentialsRow[]
     */
    public array $credentialsTable {
            get => $this->credentialsTable;
    }

    public function __construct()
    {
        $this->credentialsTable = array(
            0 =>    new CredentialsRow(0, 'root', 'root'),
            1 =>    new CredentialsRow(1, 'admin', 'admin')
        );

    }
}