<?php

namespace Moot;

interface Actionable
{
    public function invoke(Modelable $model, array $args): void;
}