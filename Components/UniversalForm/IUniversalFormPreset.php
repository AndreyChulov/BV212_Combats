<?php

namespace Components;


interface IUniversalFormPreset
{
    public function getLogoTitle(): string;

    public function getUserNamePlaceHolder(): string;

    public function getUserPasswordPlaceHolder(): string;

    public function getProceedLink(): string;

    public function isLoginSubmitButtonHidden(): bool;

    public function isSignUpSubmitButtonHidden(): bool;

    public function isRestoreSubmitButtonHidden(): bool;

    public function isLoginLinkHidden(): bool;

    public function isSignUpLinkHidden(): bool;

    public function isRestoreLinkHidden(): bool;

}