<?php

namespace App\Http\Controllers;

use App\Services\ReportsService;

class ReportsController extends Controller
{
    private $reportsService;

    public function __construct()
    {
        $this->reportsService = new ReportsService();
    }

    public function index()
    {
        $responseData = $this->reportsService->listAll();

        return response($responseData);
    }

    public function show($id)
    {
        $responseData = $this->reportsService->buildReport($id);

        // on this way, the return is a json
        return response($responseData);

        // on this way, the return is a variable to the view
        // return view('reports.show', ['responseData' => $responseData]);
    }
}
