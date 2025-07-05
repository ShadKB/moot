<?php

namespace Moot\Containers;

final class AccountContainer extends \Moot\Container
{
    public function __construct()
    {
        parent::__construct(new \Moot\Models\AccountModel, new \Moot\Views\AccountView, new \Moot\Controllers\AccountController);
    }
}