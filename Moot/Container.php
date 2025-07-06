<?php

namespace Moot;

/**
 * Base class for all containers.
 */
abstract class Container
{
    /**
     * Subclasses must specify a valid model to use via its classname.
     * @var string
     */
    protected string $modelClass;
    /**
     * Model instance constructed from its classname.
     * @var Modelable
     */
    private Modelable $model;
    /**
     * Subclasses must specify a valid view to use via its classname.
     * @var string
     */
    protected string $viewClass;
    /**
     * View instance constructed from its classname.
     * @var View
     */
    private View $view;
    /**
     * Subclasses must specify a valid controller to use via its classname.
     * @var string
     */
    protected string $controllerClass;
    /**
     * Controller instance constructed from its classname.
     * @var Controller
     */
    private Controller $controller;

    /**
     * Quick and dirty helper that needs to be optimized.
     * @param string $subclass
     * @param string $superclass
     * @throws \Exception
     * @return Modelable|View|Container
     */
    private static function __instantiate(string $subclass, string $superclass): Modelable|View|Container
    {
        $refl = new \ReflectionClass($subclass);

        if (!$refl->isSubclassOf($superclass)) {
            throw new \Exception("'$subclass' is not a subclass of '$superclass'");
        }
        $inst = $refl->newInstanceWithoutConstructor();

        return $inst;
    }

    final public function __construct()
    {
        if (!isset($this->modelClass, $this->viewClass, $this->controllerClass)) {
            throw new \Exception("A model, view, and controller must be specified in the '" . get_called_class() . "' container subclass");
        }
        $this->model = self::__instantiate($this->modelClass, Modelable::class);
        $this->view = self::__instantiate($this->viewClass, View::class);
        $this->controller = self::__instantiate($this->controllerClass, Controller::class);
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

    /**
     * Invoke a controller action associated with a controller.
     * @param string $class
     * @param array $args
     * @return void
     */
    public function actuate(string $class, array $args): void
    {
        $this->controller->invokeAction($class, $this->model, $args);
    }

    /**
     * Renders the container.
     * @return bool|string
     */
    public function render(): bool|string
    {
        ob_start();

        $this->view->output($this->model ?? null);

        $output = ob_get_clean();

        return $output;
    }

    public function __tostring(): string
    {
        return $this->render();
    }
}