<?php

namespace Components\SessionData;

require_once __DIR__ . '/../../Settings.php';

abstract class BaseSessionData
{
    private readonly string $_sessionParameterName;
    private readonly int $_session_timeout;

    private mixed $data;
    private int $timestamp;

    public bool $IsDataExists { get => isset($_SESSION[$this->_sessionParameterName]); }
    public bool $IsSessionTimeout { get => time() - $this->timestamp > $this->_session_timeout ; }

    public function __construct(string $_sessionParameterName)
    {
        global $SESSION_TIMEOUT;

        $this->_sessionParameterName = $_sessionParameterName;
        $this->_session_timeout = $SESSION_TIMEOUT;
        //$this->IsDataExists = isset($_SESSION[$_sessionParameterName]);

        if ($this->IsDataExists) {
            $this->data = $_SESSION[$_sessionParameterName];
            $this->timestamp = $_SESSION["timestamp"] ?? time();
        } else {
            $this->data = [];
            $this->timestamp = time();
        }


    }

    public function __get(string $name)
    {
        return $this->data->$name;// если $name = qaz то эквивалентный вызов return $this->data->qaz;
    }

    public function __set(string $name, $value)
    {
        $this->data[$name] = $value;
        $this->UpdateData();
    }

    protected function UpdateData() : void
    {
        $_SESSION["timestamp"] = time();
        $_SESSION[$this->_sessionParameterName] = $this->data;
    }

    public function ClearData() : void
    {
        unset($_SESSION[$this->_sessionParameterName]);
        $this->__construct($this->_sessionParameterName);
    }
}