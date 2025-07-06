<?php

require '../autoload.php';

$container = new Containers\AdminContainer;
echo $container->render();

exit();