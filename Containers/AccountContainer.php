<?php

namespace Containers;

final class AccountContainer extends \Moot\HttpContainer
{
    public function __construct()
    {
        parent::__construct(new \Models\AccountModel, new \Views\AccountView, new \Controllers\AccountController);
    }
}