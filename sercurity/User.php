<?php
require_once __DIR__."/ROLE.php";
class User
{
    private ROLE $role;
    private string $username;

    public function getRole(): ROLE
    {
        return $this->role;
    }

    public function setRole(ROLE $role): void
    {
        $this->role = $role;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param ROLE $role
     * @param string $username
     */
    public function __construct(ROLE $role, string $username)
    {
        $this->role = $role;
        $this->username = $username;
    }
}