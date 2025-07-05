<?php

require 'autoload.php';

$container_class = $_GET['container'];
$input_data = file_get_contents('php://input');
$input = json_decode($input_data, true);

$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\Container::class)) {
    $container = $reflection->newInstance();
    $unserialize = filter_var($_GET['unserialize'] ?? false, FILTER_VALIDATE_BOOLEAN);

    if ($unserialize && isset($input['model_data'])) {
        $container->setModel(unserialize($input['model_data']));
    }
    $action_class = $_GET['action'];
    $container->actuate($action_class, $input['args'] ?? []);
    $serialize = filter_var($_GET['serialize'] ?? false, FILTER_VALIDATE_BOOLEAN);
    header('Content-Type: application/json; charset=utf-8');

    if ($serialize) {
        $output = json_encode(['model_data' => serialize($container->getModel())]);
        echo $output;
    } else {
        echo $container->render();
    }
}

exit();