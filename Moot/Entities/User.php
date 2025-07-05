<?php

namespace Moot\Entities;

use Moot\Schema\DataType;
use Moot\Attributes\Column;

#[\Moot\Attributes\Table('user')]
final class User
{
    #[Column(DataType::String, 'username')]
    public string $username;
}