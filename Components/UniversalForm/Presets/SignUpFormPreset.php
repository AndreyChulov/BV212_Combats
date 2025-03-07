<?php

namespace Components\Presets;

require_once __DIR__ . '/../IUniversalFormPreset.php';

use Components\IUniversalFormPreset;

class SignUpFormPreset implements IUniversalFormPreset
{
    private const string _LOGO_TITLE = "Combats регистрация";
    private const string _USER_NAME_PLACEHOLDER = "Введите имя пользователя";
    private const string _USER_PASSWORD_PLACEHOLDER = "Введите пароль пользователя";
    private const string _SIGN_IN_BUTTON_TEXT = "";
    private const string _FORGOT_PASSWORD_LINK_TEXT = "";
    private const string _SIGN_UP_LINK_TEXT = "Я все вспомнил(а)? Я вхожу?";
    private const string _PROCEED_LINK = "#";

    public function getLogoTitle(): string
    {
        return $this::_LOGO_TITLE;
    }

    public function getUserNamePlaceHolder(): string
    {
        return $this::_USER_NAME_PLACEHOLDER;
    }

    public function getUserPasswordPlaceHolder(): string
    {
        return $this::_USER_PASSWORD_PLACEHOLDER;
    }

    public function getProceedLink(): string
    {
        return $this::_PROCEED_LINK;
    }

    public function isLoginSubmitButtonHidden(): bool
    {
        return true;
    }

    public function isSignUpSubmitButtonHidden(): bool
    {
        return false;
    }

    public function isRestoreSubmitButtonHidden(): bool
    {
        return true;
    }

    public function isLoginLinkHidden(): bool
    {
        return false;
    }

    public function isSignUpLinkHidden(): bool
    {
        return true;
    }

    public function isRestoreLinkHidden(): bool
    {
        return false;
    }
}