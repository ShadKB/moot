<?php

namespace Moot;

abstract class Controller
{
    private static array $actionInstances = [];

    protected array $useActions = [];

    private static function instantiateAction(string $class): Actionable
    {
        if (!isset(self::$actionInstances[$class])) {
            $refl = new \ReflectionClass($class);

            if (!$refl->isSubclassOf(Actionable::class)) {
                throw new \Exception("Action class is not actionable");
            }
            self::$actionInstances[$class] = $refl->newInstanceWithoutConstructor();
        }

        return self::$actionInstances[$class];
    }

    public function useAction(string $class): void
    {
        array_push($this->useActions, $class);
    }

    public function invokeAction(string $class, Modelable $model, array $args): void
    {
        if (!in_array($class, $this->useActions)) {
            throw new \Exception('Controller does not use action');
        }
        self::instantiateAction($class)->invoke($model, $args);
    }
}