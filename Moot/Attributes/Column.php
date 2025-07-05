<?php

namespace Moot\Attributes;

use Attribute;
use Schema\DataType;

#[Attribute(Attribute::TARGET_PROPERTY)]
/**
 * Summary of Column
 */
class Column
{
    /**
     * Summary of dataType
     * @var DataType
     */
    public DataType $dataType;
    /**
     * Summary of name
     * @var string
     */
    public string $name;

    /**
     * Summary of __construct
     * @param \Schema\DataType $dataType
     * @param string $name
     */
    public function __construct(DataType $dataType, string $name)
    {
        $this->dataType = $dataType;
        $this->name = $name;
    }
}