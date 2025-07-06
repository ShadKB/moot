<?php

namespace Moot;

abstract class HttpContainer extends Container
{
    protected string $contentType = 'text/html; charset=utf-8';

    public function getContentType(): string
    {
        return $this->contentType;
    }
}