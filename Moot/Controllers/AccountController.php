<?php

namespace Moot\Controllers;

final class AccountController extends \Moot\Controller
{
    public function __construct()
    {
        $this->useAction(\Moot\Actions\SaveUserAction::class);
    }
}