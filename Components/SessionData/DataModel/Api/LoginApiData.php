<?php

namespace Components\SessionData\DataModel\Api;

class LoginApiData
{
    private const string SESSION_PARAMETER = "LoginApiData";

    public readonly bool $IsApiDataExists;

    private bool | null $_isLoginSuccess;
    private string | null $_userName;
    private string | null $_message;

    public bool | null $IsLoginSuccess{
        get => $this->_isLoginSuccess;
        set(bool|null $value) {
            $this->_isLoginSuccess = $value;
            $this->UpdateSessionData();
        }
    }

    public string | null $UserName{
        get => $this->_userName;
        set(string | null $value) {
            $this->_userName = $value;
            $this->UpdateSessionData();
        }
    }


    public string | null $Message{
        get => $this->_message;
        set(string | null $value) {
            $this->_message = $value;
            $this->UpdateSessionData();
        }
    }

    public function __construct(){
        if (isset($_SESSION[self::SESSION_PARAMETER])){
            $data = $_SESSION[self::SESSION_PARAMETER];
            $this->_isLoginSuccess = $data["isLoginSuccess"];
            $this->IsApiDataExists = true;
            $this->_userName = $data["userName"];
            $this->_message = $data["message"];
        } else {
            $this->_isLoginSuccess = null;
            $this->IsApiDataExists = false;
            $this->_userName = null;
            $this->_message = null;
        }
    }

    private function UpdateSessionData(): void
    {
        $data = [
            'isLoginSuccess' => $this->_isLoginSuccess,
            'userName' => $this->_userName,
            'message' => $this->_message
        ];
        $_SESSION[self::SESSION_PARAMETER] = $data;
    }
}