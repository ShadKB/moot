<?php

class TemplateView extends \Moot\View
{
    private $variables = [];

    public function output(\Moot\Modelable $model): void
    {
        $subclass = get_called_class();
        preg_match('/^Views\\\(.+)View$/', $subclass, $matches);

        if (empty($matches)) {
            throw new \Exception('Template view subclass is invalid');
        }
        $template = strtolower(str_replace('\\', '/', $matches[1]));
        extract($this->variables);
        include MOOT_BASEDIR . '/templates/' . $template . '.php';
    }

    public function __set($name, $value): void
    {
        $this->variables[$name] = $value;
    }
}