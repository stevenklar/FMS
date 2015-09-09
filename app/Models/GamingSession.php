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
        // fake
        $fakeObject = new \App\Models\Object();
        $fakeObject->id = rand(0, 1000000);
        $fakeObject->name = 'Heros 34.12.01';
        $fakeObject->status = '2';
        $fakeObject->category = 'THW Wache 01';

        $fakeObject2 = clone $fakeObject;
        $fakeObject2->category = 'BF Nord';
        $fakeObject2->name = 'LF 16 33.42.01';

        return [$fakeObject, $fakeObject, $fakeObject, $fakeObject2];

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

