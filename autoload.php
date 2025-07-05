<?php

define('MOOT_ROOT', dirname(__FILE__));

function load_class(string $class): void
{
    include_once MOOT_ROOT . '/' . str_replace('\\', '/', $class) . '.php';
}
spl_autoload_register('load_class');