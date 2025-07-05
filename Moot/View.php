<?php

namespace Moot;

abstract class View
{
    public const string CONTENT_TYPE = 'text/html; charset=utf-8';

    abstract public function output(Modelable $model): void;
}