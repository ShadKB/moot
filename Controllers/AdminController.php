<?php

namespace Controllers;

final class AdminController extends \Moot\Controller
{
    protected array $useActions = [
        \Actions\SaveUserAction::class,
    ];
}