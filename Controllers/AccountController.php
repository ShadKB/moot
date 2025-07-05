<?php

namespace Controllers;

final class AccountController extends \Moot\Controller
{
    public function __construct()
    {
        $this->useAction(\Actions\SaveUserAction::class);
    }
}