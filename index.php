<?php

require 'autoload.php';

$container_class = $_GET['container'];
$input_data = file_get_contents('php://input');
$input = json_decode($input_data, true);

$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\Container::class)) {
    $container = $reflection->newInstance();
    header('Content-Type: ' . $container->getContentType());
    echo $container->render();
}

exit();