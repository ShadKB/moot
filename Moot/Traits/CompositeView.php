<?php

namespace Moot\Traits;

trait CompositeView
{
    public function partial(string $template)
    {

    }

    public function view(string $containerClass): string
    {
        $reflection = new \ReflectionClass($containerClass);

        if ($reflection->isSubclassOf(\Moot\Container::class)) {
            $container = $reflection->newInstance();
            $output = $container->render();
        } else {
            $output = '';
        }
        return $output;
    }
}