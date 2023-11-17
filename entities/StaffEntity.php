<?php

namespace model;

class StaffEntity
{
    public int $id;
    public string $name;
    public string $address;
    public int $deptId;
    public DepartmentEntity $department;

    /**
     * @param int $id
     * @param string $name
     * @param string $address
     * @param int $deptId
     */
    public function __construct(int $id, string $name, string $address, int $deptId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->deptId = $deptId;
    }
}