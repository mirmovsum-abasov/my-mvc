<?php

use app\core\Controller\Controller;

class YoxlaController extends Controller
{
    public function index()
    {
        $this->view('home/yoxla');
    }
}