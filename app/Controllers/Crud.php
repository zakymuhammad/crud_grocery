<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;

class Crud extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();
        $crud->setTable('users');
        $output = $crud->render();
        return view('example', (array)$output);
    }
}
