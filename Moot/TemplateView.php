<?php

namespace Moot;

class TemplateView extends \Moot\View
{
    public const string TEMPLATE = '404';

    public function output(\Moot\Modelable $model): void
    {
        include MOOT_AUTOLOAD_ROOT . '/templates/' . str_replace('.', DIRECTORY_SEPARATOR, $this::TEMPLATE) . '.php';
    }
}