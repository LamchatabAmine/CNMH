<?php

namespace App\Http\Controllers;

use App\CustomNamespace\CustomNamespace;



class HomeController extends Controller
{
    public function index()
    {
        $customInstance = new CustomNamespace();
        $message = $customInstance->sayHello();

        return view('welcome', ['message' => $message]);
    }
}
