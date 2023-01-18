<?php

namespace App\Controllers;

class Home extends BaseController
{

    private $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new \App\Models\DiskonModel();
    }

    public function index()
    {
        return view('home', [
            'diskon' => $this->diskonModel->findAll(),
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
}
