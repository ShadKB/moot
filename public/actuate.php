<?php

require '../autoload.php';

$request_data = [];

if (in_array($_SERVER['REQUEST_METHOD'], ['POST', 'PUT'])) {
    $request_data = json_decode(file_get_contents('php://input'), true);
}
$container_class = $_GET['container'];
$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\HttpContainer::class)) {
    $container = $reflection->newInstance();
    $unserialize = filter_var($_GET['unserialize'] ?? false, FILTER_VALIDATE_BOOLEAN);

    if ($unserialize && isset($request_data['model'])) {
        $container->setModel(unserialize($request_data['model']));
    }
    $action_class = $_GET['action'];
    $container->actuate($action_class, $_GET);
    $serialize = filter_var($_GET['serialize'] ?? false, FILTER_VALIDATE_BOOLEAN);

    if ($serialize) {
        header('Content-Type: application/json; charset=utf-8');
        $output = json_encode(['model' => serialize($container->getModel())]);
        echo $output;
    } else {
        header('Content-Type: ' . $container->getContentType());
        echo $container->render();
    }
}

exit();