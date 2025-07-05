<?php

namespace Moot\Models;

final class AccountModel implements \Moot\Modelable
{
    private \Moot\Entities\User $user;

    public array $data = ['name' => 'Papa'];

    public function __serialize()
    {
        return $this->data;
    }

    public function __unserialize($data)
    {
        $this->data = $data;
    }
}