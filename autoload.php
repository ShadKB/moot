<?php

define('MOOT_DIRECTORY', dirname(__FILE__));

function load_class(string $class): void
{
    include_once MOOT_DIRECTORY . '/' . str_replace('\\', '/', $class) . '.php';
}
spl_autoload_register('load_class');