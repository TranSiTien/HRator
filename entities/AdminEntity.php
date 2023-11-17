<?php

namespace model;

class AdminEntity
{
    public int $id;
    public string $username;
    public string $password;

    /**
     * @param int $id
     * @param string $username
     * @param string $password
     */
    public function __construct(int $id, string $username, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
}