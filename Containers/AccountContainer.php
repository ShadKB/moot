<?php

namespace Containers;

final class AccountContainer extends \Moot\Container
{
    public function __construct()
    {
        parent::__construct(new \Models\AccountModel, new \Views\AccountView, new \Controllers\AccountController);
    }
}