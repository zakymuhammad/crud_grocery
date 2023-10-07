<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;
use LDAP\Result;

define('_TITLE', 'Customer');

class Location extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();
        $crud->setLanguage('Indonesia');
        $crud->setTable('outlet');
        $output = $crud->render();

        $data = [
            'title' => _TITLE,
            'result' => $output
        ];



        return view('location/index', (array)$output);
    }
}
