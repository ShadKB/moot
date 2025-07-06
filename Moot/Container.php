<?php

namespace Moot;

abstract class Container
{
    protected string $modelClass;
    private Modelable $model;
    protected string $viewClass;
    private View $view;
    protected string $controllerClass;
    private Controller $controller;

    private static function __instantiate($subclass, $superclass)
    {
        $reflection = new \ReflectionClass($subclass);

        if ($reflection->isSubclassOf($superclass)) {
            return $reflection->newInstanceWithoutConstructor();
        }
        throw new \Exception("'$subclass' is not a subclass of '$superclass'");
    }

    public function __construct()
    {
        if (isset($this->modelClass)) {
            $this->model = self::__instantiate($this->modelClass, Modelable::class);
        }

        if (isset($this->viewClass)) {
            $this->view = self::__instantiate($this->viewClass, View::class);
        }

        if (isset($this->controllerClass)) {
            $this->controller = self::__instantiate($this->controllerClass, Controller::class);
        }
    }

    public function getModel(): Modelable
    {
        return $this->model;
    }

    public function setModel(Modelable $model): void
    {
        $this->model = $model;
    }

    public function getView(): View
    {
        return $this->view;
    }

    public function actuate(string $class, array $args): void
    {
        if (!isset($this->controller)) {
            throw new \Exception('Controller is not set');
        }
        $this->controller->invokeAction($class, $this->model, $args);
    }

    public function render(): string
    {
        if (!isset($this->view)) {
            throw new \Exception('View is not set');
        }
        ob_start();
        $this->view->output($this->model);
        $output = ob_get_clean();
        return $output;
    }
}