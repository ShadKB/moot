<?php

namespace Moot;

abstract class View
{
    abstract public function output(Modelable $model): void;
}