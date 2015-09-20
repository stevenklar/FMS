<?php

namespace App\Models;

use App\Session;
use App\Models\GamingSession;

class SessionManager implements SessionManagerInterface {

    public function create($name, $objects, $scope, $password = '')
    {
        $uniqueIdFound = false;
        $id = 'wrong';

        while(!$uniqueIdFound) {
            $id = $this->v4();

            $findSession = Session::where('sid', '=', $id)
                ->get()
                ->count();

            if ($findSession == 0) {
                $uniqueIdFound = true;
            }
        }

        $session = Session::create([
            'sid' => $id,
            'name' => $name,
            'scope' => $scope,
            'password' => $password
        ]);

        foreach ($objects as $category => $gameObjects) {
            foreach ($gameObjects as $gameObject) {
                $object = new \App\Object();
                $object->log = $gameObject['log'];
                $object->name = $gameObject['display'];
                $object->status = $gameObject['state'];
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
                ->where('log', '=', $object['name'])
                ->first();

            if (is_null($gameObject)) {
                continue;
            }

            // there is no status 0 - its a C!
            if ($object['status'] == '0' && !starts_with($object['name'], 'BMA')) {
                $object['status'] = 'C';
            }

            // status 9 means patrol for police which
            // means free on radio
            if ($object['status'] == '9') {
                $object['status'] = '1';
            }

            $gameObject->status = $object['status'];
            $gameObject->save();
        }

        return $sessionId;
    }

    private function v4()
    {
        return sprintf('%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

}

