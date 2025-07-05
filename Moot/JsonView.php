<?php

namespace Moot;

abstract class JsonView extends View
{
    public const string CONTENT_TYPE = 'application/json; charset=utf-8';

    abstract public function output(Modelable $model): void;
}