<?php

namespace App\Models;

class GamingSession {

    const SCOPE_PUBLIC = 'public';
    const SCOPE_PRIVATE = 'private';

    private $id;
    private $name;
    private $objects = [];
    private $scope = self::SCOPE_PUBLIC;
    private $password;

    private $locked = false;

    public function __construct($sessionId, $name, $objects, $scope, $password = '')
    {
        $this->id = $sessionId;
        $this->name = $name;
        $this->objects = $objects;
        $this->scope = $scope;
        $this->password = $password;

        if ($scope == self::SCOPE_PRIVATE) {
            $this->locked = true;
        }
    }

    public function isPrivate()
    {
        return ($this->scope == self::SCOPE_PRIVATE) ? true : false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getObjects()
    {
        return $this->objects;
    }

    public function unlock($password)
    {
        if ($password == $this->password) {
            $this->locked = false;

            return true;
        }

        return false;
    }
}

