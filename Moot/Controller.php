<?php

namespace Moot;

abstract class Controller
{
    private static array $actionInstances = [];

    protected array $useActions = [];

    private static function instantiateAction(string $class): Actionable
    {
        if (!isset(self::$actionInstances[$class])) {
            $reflection = new \ReflectionClass($class);

            if ($reflection->isSubclassOf(Actionable::class)) {
                self::$actionInstances[$class] = $reflection->newInstanceWithoutConstructor();
            } else {
                throw new \Exception("Action class is not actionable");
            }
        }
        return self::$actionInstances[$class];
    }

    public function useAction(string $class): void
    {
        array_push($this->useActions, $class);
    }

    public function invokeAction(string $class, Modelable $model, array $args): void
    {
        if (in_array($class, $this->useActions)) {
            self::instantiateAction($class)->invoke($model, $args);
        } else {
            throw new \Exception('Controller does not use action');
        }
    }
}