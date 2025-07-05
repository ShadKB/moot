<?php

namespace Models;

final class AccountModel implements \Moot\Modelable
{
    private \Entities\User $user;

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