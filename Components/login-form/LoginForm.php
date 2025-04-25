<?php

namespace Components;

$folder = dirname(__FILE__);

require_once "$folder/../../Settings.php";

class LoginForm
{
    private readonly string $_ROOT_URL;
    private readonly string $_LOGO_TITLE;
    private readonly string $_USER_NAME_PLACEHOLDER;
    private readonly string $_USER_PASSWORD_PLACEHOLDER;
    private readonly string $_SIGN_IN_BUTTON_TEXT;
    private readonly string $_FORGOT_PASSWORD_LINK_TEXT;
    private readonly string $_SIGN_UP_LINK_TEXT;

    public function __construct(
        string $logoTitle,
        string $UserNamePlaceholder,
        string $UserPasswordPlaceholder,
        string $SignInButtonText,
        string $SignUpLinkText,
        string $ForgotPasswordLinkText)
    {
        global $ROOT_URL;

        $this->_ROOT_URL = $ROOT_URL;
        $this->_LOGO_TITLE = $logoTitle;
        $this->_USER_NAME_PLACEHOLDER = $UserNamePlaceholder;
        $this->_USER_PASSWORD_PLACEHOLDER = $UserPasswordPlaceholder;
        $this->_SIGN_IN_BUTTON_TEXT = $SignInButtonText;
        $this->_SIGN_UP_LINK_TEXT = $SignUpLinkText;
        $this->_FORGOT_PASSWORD_LINK_TEXT = $ForgotPasswordLinkText;
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
                    <input id="username" name="username" class='lf--input' placeholder='$this->_USER_NAME_PLACEHOLDER' type='text'>
                </div>
                <div class="flex-row">
                    <input id="password" name="password" class='lf--input' placeholder='$this->_USER_PASSWORD_PLACEHOLDER' type='password'>
                </div>
                <input class='lf--submit' type='submit' value='$this->_SIGN_IN_BUTTON_TEXT'>
                <a class='lf--forgot' href='#'>$this->_FORGOT_PASSWORD_LINK_TEXT</a>
                <a class='lf--register' href='#'>$this->_SIGN_UP_LINK_TEXT</a>
            </form>
            HTML;

    }

    public function EchoHeader() : void {
        $styleResetLink = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css";
        $styleLink = realpath("$this->_ROOT_URL/CSS/form.css");

        echo '<link rel="stylesheet" href="' . $styleResetLink . '">';
        echo '<link rel="stylesheet" href="' . $styleLink . '">';
    }

}