<?php

namespace DBO\DataModel;

class CredentialsRow
{
    public int $Id;
    public string $UserName;
    public string $Password;

    public function __construct(int $Id, string $UserName, string $Password)
    {

        $this->Id = $Id;
        $this->UserName = $UserName;
        $this->Password = $Password;
    }
}