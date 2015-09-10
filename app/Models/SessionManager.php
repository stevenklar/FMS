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

        foreach ($objects['categories'] as $category => $gameObjects) {
            foreach ($gameObjects as $gameObject) {
                $object = new \App\Object();
                $object->name = $gameObject;
                $object->status = '2';
                $object->category = $category;
                $object->session_id = $id;
                $object->save();
            }
        }

        return new GamingSession(
            $session->sid,
            $session->name,
            [],
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

        $objects = \App\Object::where('session_id', '=', $sessionId)
            ->get()
            ->toArray();

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
        foreach ($objects as $object) {
            $gameObject = \App\Object::where('session_id', '=', $sessionId)
                ->where('name', '=', $object['name'])
                ->first();

            if (is_null($gameObject)) {
                continue;
            }

            $gameObject->status = $object['status'];
            $gameObject->save();
        }

        return $sessionId;
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

