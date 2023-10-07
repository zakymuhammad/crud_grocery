<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function user()
    {
        return view('user/index');
    }

    // public function userv2()
    // {
    //     return view('index');
    // }

    // public function grocery()
    // {
    //     return view('crud');
    // }
}
