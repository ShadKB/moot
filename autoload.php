<?php

define('MOOT_AUTOLOAD_ROOT', dirname(__FILE__));

function load_class(string $class): void
{
    include_once MOOT_AUTOLOAD_ROOT . '/' . str_replace('\\', '/', $class) . '.php';
}
spl_autoload_register('load_class');