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

    public function show($id)
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

        return view('show', compact('categories'));
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
                'sessionId' => $session->getId(),
                'status' => 'OK'
            ];
        }

        if (is_null($session)) {
            return redirect('/');
        }

        \Session::put('session.'. $session->getId() .'.password', $password);

        return redirect('/show/' . $session->getId());
    }

    public function update(Request $request, $id)
    {
        if (!$request->isJson()) {
            return 'NOK';
        }

        return [
            'sessionId' => $session->getId(),
            'status' => 'OK'
        ];
    }

}
