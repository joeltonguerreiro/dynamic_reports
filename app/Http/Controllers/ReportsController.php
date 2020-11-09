<?php

namespace App\Http\Controllers;

use App\Services\ReportsService;
use Illuminate\Http\Request;

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

        return view('reports.index', ['reports' => $responseData]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->reportsService->add($request);
            return redirect('/reports');
        }

        if ($request->isMethod('get')) {
            return view('reports.add');
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->reportsService->edit($request, $id);
            return redirect('/reports');
        }

        if ($request->isMethod('get')) {
            $report = $this->reportsService->get($id);

            return view('reports.edit', ['report' => $report]);
        }
    }

    public function show($id)
    {
        $responseData = $this->reportsService->buildReport($id);

        // on this way, the return is a json
        // return response($responseData);

        // on this way, the return is a variable to the view
        return view('reports.show', ['responseData' => $responseData]);
    }
}
