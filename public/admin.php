<?php

require '../autoload.php';

$container = new Containers\AdminContainer;
$view = $container->getView();
$container_class = 'Containers\\UserContainer'; // Test with cli: php index.php
$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\HttpContainer::class)) {
    $content = $reflection->newInstance();
    $view['content'] = $content;
}
echo $container->render();

exit();