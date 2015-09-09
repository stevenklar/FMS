<?php

namespace App\Models;

use App\Models\GamingSession as Session;

class MemorySessionManager implements SessionManagerInterface {

    private $sessions = [];

    public function create($name, $objects, $scope, $password = '')
    {
        $convertedObjects = $this->convertObjects($objects);

        $this->sessions['test'] = new Session(
            'test',
            $name,
            $convertedObjects,
            $scope,
            $password
        );
    }

    public function read($sessionId)
    {
        // create dummy
        $this->create('test_name', [], 'private', 'password');

        // function begins
        if (empty($this->sessions) ||
            !isset($this->sessions[$sessionId])) {

            return null;
        }

        return $this->sessions[$sessionId];
    }

    public function update($sessionId, $objects)
    {
    }

    private function convertObjects($objects)
    {
        if (empty($objects)) {
            return [];
        }

        dd($objects);
    }

}

