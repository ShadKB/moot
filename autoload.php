<?php

define('MOOT_BASEDIR', dirname(__FILE__));

function load_class(string $class): void
{
    include_once MOOT_BASEDIR . '/' . str_replace('\\', '/', $class) . '.php';
}
spl_autoload_register('load_class');