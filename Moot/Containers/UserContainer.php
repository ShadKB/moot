<?php

namespace Moot\Containers;

final class UserContainer extends \Moot\Container
{
    public function __construct()
    {
        parent::__construct(new \Moot\Models\AccountModel, new \Moot\Views\UserView, new \Moot\Controllers\AccountController);
    }
}