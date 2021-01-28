<?php

use App\Core\Controller\Controller;
use app\Core\Session\Session;
use App\Core\Validation\Validation;

class HomeController extends Controller
{
    public function index($error = [])
    {

        $this->view('home/index');
    }
}