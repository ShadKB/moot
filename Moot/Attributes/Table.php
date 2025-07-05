<?php

namespace Moot\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
/**
 * Summary of Table
 */
class Table
{
    /**
     * Summary of name
     * @var string
     */
    public string $name;

    /**
     * Summary of __construct
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}