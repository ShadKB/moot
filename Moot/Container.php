<?php

namespace Moot;

abstract class Container
{
    protected Modelable $model;
    protected View $view;
    protected Controller $controller;

    public function __construct(Modelable $model, View $view, Controller $controller)
    {
        $this->setModel($model);
        $this->view = $view;
        $this->controller = $controller;
    }

    public function setModel(Modelable $model): void
    {
        $this->model = $model;
    }

    public function getModel(): Modelable
    {
        return $this->model;
    }

    public function actuate(string $class, array $args): void
    {
        $this->controller->invokeAction($class, $this->model, $args);
    }

    public function getContentType(): string
    {
        return $this->view::CONTENT_TYPE;
    }

    public function render(): string
    {
        ob_start();
        $this->view->output($this->model);
        $output = ob_get_clean();
        return $output;
    }
}