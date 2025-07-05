<?php

require 'autoload.php';

$site_model = new Models\SiteModel;
$html_view = new Views\HtmlView;
$container_class = 'Containers\\UserContainer'; // Test with cli: php index.php
$reflection = new ReflectionClass($container_class);

if ($reflection->isSubclassOf(Moot\Container::class)) {
    $container = $reflection->newInstance();
    $html_view['content'] = $container;
}
echo $html_view->output($site_model);

exit();