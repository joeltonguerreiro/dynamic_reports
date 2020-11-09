<?php

namespace App\Http\Controllers;

use App\Services\WebsitesService;

class WebsitesController extends Controller
{
    private $websitesService;

    public function __construct()
    {
        $this->websitesService = new WebsitesService();
    }

    public function index()
    {
        $responseData = $this->websitesService->listAll();

        return response($responseData);
    }
}
