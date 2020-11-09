<?php

namespace App\Http\Controllers;

use App\Services\MetasService;

class MetasController extends Controller
{
    private $metasService;

    public function __construct()
    {
        $this->metasService = new MetasService();
    }

    public function index()
    {
        $responseData = $this->metasService->listAll();

        return view('metas.index', ['metas' => $responseData]);
    }
}
