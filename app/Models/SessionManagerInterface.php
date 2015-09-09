<?php

namespace App\Models;

interface SessionManagerInterface
{
    public function create($name, $objects, $scope, $password = '');
    public function read($sessionId);
    public function update($sessionId, $objects);
}

