<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('websites.index', ['websites' => $responseData]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->websitesService->add($request);
            return redirect('/websites');
        }

        if ($request->isMethod('get')) {
            return view('websites.add');
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->websitesService->edit($request, $id);
            return redirect('/websites');
        }

        if ($request->isMethod('get')) {
            $website = $this->websitesService->get($id);

            return view('websites.edit', ['website' => $website]);
        }
    }
}
