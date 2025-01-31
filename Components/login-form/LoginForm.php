<?php

namespace Components;

$folder = dirname(__FILE__);

require_once "$folder/../../Settings.php";

class LoginForm
{
    private readonly string $_ROOT_URL;
    private readonly string $_LOGO_TITLE;

    public function __construct(string $logoTitle)
    {
        global $ROOT_URL;

        $this->_ROOT_URL = $ROOT_URL;
        $this->_LOGO_TITLE = $logoTitle;
    }

    public function EchoBody() : void {
        echo <<< HTML
            <form class='login-form' method="post" action="auth.php">
                <div class="flex-row logo">
                    <svg>
                        <image href="./Images/logo.svg"></image>
                    </svg>
                    <h1>$this->_LOGO_TITLE</h1>
                </div>
                <div class="flex-row">
                    <input id="username" name="username" class='lf--input' placeholder='Your username' type='text'>
                </div>
                <div class="flex-row">
                    <input id="password" name="password" class='lf--input' placeholder='Your password' type='password'>
                </div>
                <input class='lf--submit' type='submit' value='Sign Up'>
                <a class='lf--forgot' href='#'>Already throwing balls? Log In</a>
            </form>
            HTML;

    }

    public function EchoHeader() : void {
        $styleResetLink = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css";
        $styleLink = "$this->_ROOT_URL/Components/login-form/css/style.css";

        echo '<link rel="stylesheet" href="' . $styleResetLink . '">';
        echo '<link rel="stylesheet" href="' . $styleLink . '">';
    }

}