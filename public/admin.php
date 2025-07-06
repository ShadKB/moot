<?php

require '../autoload.php';
require '../includes/core.php';

$container = new Containers\AdminContainer;
echo $container->render();

exit();