<?php

function container($class): Moot\Container|null
{
    $refl = new ReflectionClass($class);

    if (!$refl->isSubclassOf(Moot\Container::class)) {
        throw new Exception("'$class' is not a valid container");
    }
    $inst = $refl->newInstance();
    return $inst;
}