<?php

class UserEntity
{
    protected $id;
    protected $name;
    protected $age;
    protected $location;

    public function __construct(array $data) {
        $this->name = $data['username'];
        $this->age = $data['age'];
        $this->location = $data['location'];
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->name;
    }


    public function getAge()
    {
        return $this->age;
    }

    public function getLocation()
    {
        return $this->location;
    }


}
