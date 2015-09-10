<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->sessionManager = new \App\Models\SessionManager();
    }

    public function index()
    {
        return view('index');
    }

    public function get()
    {
        $id = Input::get('id');
        $scope = (Input::get('scope') == null) ? 'public' : 'private';

        $session = $this->sessionManager->read($id);

        if (is_null($session)) {
            return redirect('/');
        }

        if ($session->isPrivate()) {
            $password = Input::get('password', '');

            if (!$session->unlock($password)) {
                return redirect('/');
            }

            \Session::put('session.'. $session->getId() .'.password', $password);
        }

        return redirect('/show/' . $session->getId());
    }

    public function show(Request $request, $id)
    {
        $session = $this->sessionManager->read($id);

        if (is_null($session)) {
            return redirect('/');
        }

        if ($session->isPrivate()) {
            $password = \Session::get('session.'. $session->getId() .'.password', '');

            if (!$session->unlock($password)) {
                return redirect('/');
            }
        }

        $categories = new \App\Models\CategoryList($session);

        if ($request->isXmlHttpRequest()) {
            return $session->getObjects();
        } else {
            return view('show', compact('categories'));
        }
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $objects = $request->get('objects');
        $scope = $request->get('scope', 'public');
        $password = $request->get('password', '');

        $session = $this->sessionManager->create($name, $objects, $scope, $password);

        if ($request->isJson()) {
            if (is_null($session)) {
                return [
                    'status' => 'FAILURE',
                    'message' => 'Something went wrong'
                ];
            }

            return [
                'status' => 'OK',
                'sessionId' => $session->getId()
            ];
        }

        if (is_null($session)) {
            return redirect('/');
        }

        \Session::put('session.'. $session->getId() .'.password', $password);

        return redirect('/show/' . $session->getId());
    }

    public function update(Request $request)
    {
        $sessionId = $request->get('sessionId');

        if (empty($sessionId)) {
            return [
                'status' => 'FAILURE',
                'message' => 'Session not found'
            ];
        }

        $session = $this->sessionManager->update(
            $sessionId,
            $request->get('objects')
        );

        return [
            'status' => 'OK',
            'sessionId' => $sessionId
        ];
    }

}
