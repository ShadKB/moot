<?php

class TemplateView extends \Moot\View implements ArrayAccess
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
        include MOOT_ROOT . '/templates/' . $template . '.php';
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->variables[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return isset($this->variables[$offset]) ? $this->variables[$offset] : null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->variables[] = $value;
        } else {
            $this->variables[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->variables[$offset]);
    }
}