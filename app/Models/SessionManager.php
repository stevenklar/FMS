<?php

namespace App\Models;

use App\Session;
use App\Models\GamingSession;

class SessionManager implements SessionManagerInterface {

    public function create($name, $objects, $scope, $password = '')
    {
        $id = $this->v4();

        $session = Session::create([
            'sid' => $id,
            'name' => $name,
            'scope' => $scope,
            'password' => $password
        ]);

        // TODO: create objects...
        $objects = [];

        return new GamingSession(
            $session->sid,
            $session->name,
            $objects,
            $session->scope,
            $session->password
        );
    }

    public function read($sessionId)
    {
        $session = Session::where('sid', '=', $sessionId)->first();

        if (is_null($session)) {
            return null;
        }

        // TODO: fetch objects...
        $objects = [];

        return new GamingSession(
            $session->sid,
            $session->name,
            $objects,
            $session->scope,
            $session->password
        );

    }

    public function update($sessionId, $objects)
    {
        dd($sessionId);
    }

    private function v4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}

