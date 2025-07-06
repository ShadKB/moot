<?php

namespace Containers;

final class AccountContainer extends \Moot\HttpContainer
{
    protected string $modelClass = \Models\AccountModel::class;
    protected string $viewClass = \Views\AccountView::class;
    protected string $controllerClass = \Controllers\AccountController::class;
}