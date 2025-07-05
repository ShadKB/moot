<?php

require 'autoload.php';

$html_view = new Views\HtmlView;
$site_model = new Models\SiteModel;
$container_class = 'Containers\\UserContainer';
$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\Container::class)) {
    $container = $reflection->newInstance();
    $html_view->container = $container;
}
echo $html_view->output($site_model);

exit();