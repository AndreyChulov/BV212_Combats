<?php

namespace Components;

require_once __DIR__."/../../Settings.php";
require_once __DIR__."/IUniversalFormPreset.php";

use Components\IUniversalFormPreset;

readonly class UniversalForm
{
    private string $_ROOT_URL;
    private string $_LOGO_TITLE;
    private string $_USER_NAME_PLACEHOLDER;
    private string $_USER_PASSWORD_PLACEHOLDER;
    private string $_PROCEED_LINK;
    private bool $_IS_LOGIN_SUBMIT_BUTTON_HIDDEN;
    private bool $_IS_SIGNUP_SUBMIT_BUTTON_HIDDEN;
    private bool $_IS_RESTORE_SUBMIT_BUTTON_HIDDEN;
    private bool $_IS_LOGIN_LINK_HIDDEN;
    private bool $_IS_SIGNUP_LINK_HIDDEN;
    private bool $_IS_RESTORE_LINK_HIDDEN;

    public function __construct(IUniversalFormPreset $preset)
    {
        global $ROOT_URL;

        $this->_ROOT_URL = $ROOT_URL;
        $this->_LOGO_TITLE = $preset->getLogoTitle();
        $this->_USER_NAME_PLACEHOLDER = $preset->getUserNamePlaceHolder();
        $this->_USER_PASSWORD_PLACEHOLDER = $preset->getUserPasswordPlaceHolder();
        $this->_PROCEED_LINK = $preset->getProceedLink();
        $this->_IS_LOGIN_SUBMIT_BUTTON_HIDDEN = $preset->isLoginSubmitButtonHidden();
        $this->_IS_RESTORE_SUBMIT_BUTTON_HIDDEN = $preset->isRestoreSubmitButtonHidden();
        $this->_IS_SIGNUP_SUBMIT_BUTTON_HIDDEN = $preset->isSignupSubmitButtonHidden();
        $this->_IS_LOGIN_LINK_HIDDEN = $preset->isLoginLinkHidden();
        $this->_IS_RESTORE_LINK_HIDDEN = $preset->isRestoreLinkHidden();
        $this->_IS_SIGNUP_LINK_HIDDEN = $preset->isSignUpLinkHidden();
    }

    public function EchoBody() : void {
        $restoreSubmitButton = $this->GetRestoreSubmitButton();
        $loginSubmitButton = $this->GetLoginSubmitButton();
        $signUpSubmitButton = $this->GetSignUpSubmitButton();
        $restoreLink = $this->GetRestoreLink();
        $loginLink = $this->GetLoginLink();
        $signUpLink = $this->GetSignUpLink();

        echo <<< HTML
            <div class="flex-ltr">
                <form class='login-form' method="post" action="$this->_PROCEED_LINK">
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
                    $signUpSubmitButton
                    $loginSubmitButton
                    $restoreSubmitButton
                    $signUpLink
                    $loginLink
                    $restoreLink
                </form>
            </div>
            HTML;

    }

    private function GetRestoreLink() : string{
        if ($this->_IS_RESTORE_LINK_HIDDEN) return "";

        return "<a class='lf--alterLink restoreLink' href='#'>Ничо не помню, че делать то аааа?</a>";
    }

    private function GetLoginLink() : string{
        if ($this->_IS_LOGIN_LINK_HIDDEN) return "";

        return "<a class='lf--alterLink loginLink' href='#'>Я все вспомнил(а). Можно я войду?</a>";
    }

    private function GetSignUpLink() : string{
        if ($this->_IS_SIGNUP_LINK_HIDDEN) return "";

        return "<a class='lf--alterLink signUpLink' href='#'>Нет аккаунта? Зарегистрируйся!</a>";
    }

    private function GetRestoreSubmitButton() : string{
        if ($this->_IS_RESTORE_SUBMIT_BUTTON_HIDDEN) return "";

        return "<input class='lf--submit' type='submit' value='Восстановить пароль'>";
    }

    private function GetLoginSubmitButton() : string{
        if ($this->_IS_LOGIN_SUBMIT_BUTTON_HIDDEN) return "";

        return "<input class='lf--submit' type='submit' value='Войти'>";
    }

    private function GetSignUpSubmitButton() : string{
        if ($this->_IS_SIGNUP_SUBMIT_BUTTON_HIDDEN) return "";

        return "<input class='lf--submit' type='submit' value='Зарегистрировать'>";
    }

    public function EchoCss() : void {
        $styleResetLink = "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css";
        $styleLink = "$this->_ROOT_URL/CSS/universal_form.css";
        $animationStyleLink = "$this->_ROOT_URL/CSS/form_animation.css";

        echo <<<HTML
            <link rel="stylesheet" href="$styleResetLink">
            <link rel="stylesheet" href="$styleLink">
            <link rel="stylesheet" href="$animationStyleLink">
            HTML;
    }

    public function EchoScripts() : void {
        $animationJSLink = "$this->_ROOT_URL/JS/form_animation.js";
        $jQueryLink = "$this->_ROOT_URL/Components/JQuery/jquery-3.7.1.js";

        echo <<<HTML
            <script src="$jQueryLink"></script>`
            <script src="$animationJSLink"></script>`
            HTML;
    }
}