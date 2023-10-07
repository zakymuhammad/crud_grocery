<?php

namespace App\Controllers;

use App\Models\InfoOutletModel;
use App\Models\OutletModel;
use CodeIgniter\Controller;

class OutletController extends Controller
{
    public function index()
    {
        $outletModel = new OutletModel();
        $data['outlet'] = $outletModel->findAll();

        $infoOutletModel = new InfoOutletModel();
        $data['info_outlet'] = $infoOutletModel->findAll();

        return view('index', $data);
    }
}
