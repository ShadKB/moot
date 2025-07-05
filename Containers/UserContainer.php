<?php

namespace Containers;

final class UserContainer extends \Moot\Container
{
    public function __construct()
    {
        parent::__construct(new \Models\AccountModel, new \Views\UserView, new \Controllers\AccountController);
    }
}