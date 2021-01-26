<?php

use app\core\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(1);
        $this->view('home/index', ['name' => $user->username]);
    }
}