<?php

namespace Containers;

final class UserContainer extends \Moot\HttpContainer
{
    protected string $modelClass = \Models\AccountModel::class;
    protected string $viewClass = \Views\UserView::class;
    protected string $controllerClass = \Controllers\AccountController::class;
}