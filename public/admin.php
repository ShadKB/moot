<?php

require '../autoload.php';

$model = new Models\SiteModel;
$view = new Views\AdminView;
$container_class = 'Containers\\UserContainer'; // Test with cli: php index.php
$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\HttpContainer::class)) {
    $container = $reflection->newInstance();
    $view['container'] = $container;
}
echo $view->output($model);

exit();