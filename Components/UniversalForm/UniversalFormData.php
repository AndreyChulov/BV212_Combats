<?php

namespace Components\UniversalForm;

class UniversalFormData
{
    public string $UserName {
        get => $this->UserName;
    }

    public string $Password {
        get => $this->Password;
    }

    public function __construct(){
        $this->UserName = $_POST['username'];
        $this->Password = $_POST['password'];
    }
}