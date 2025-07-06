<?php

namespace Controllers;

final class AccountController extends \Moot\Controller
{
    protected array $useActions = [
        \Actions\SaveUserAction::class,
    ];
}