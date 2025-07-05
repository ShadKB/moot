<?php

require 'autoload.php';

$container_class = '';

$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\Container::class)) {
    $container = $reflection->newInstance();
    header('Content-Type: ' . $container->getContentType());
    echo $container->render();
}

exit();