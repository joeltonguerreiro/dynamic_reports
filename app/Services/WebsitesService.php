<?php

namespace App\Services;

use App\Models\Website;

class WebsitesService
{
    public function listAll()
    {
        return \App\Models\Website::all();
    }

    public function get(int $id)
    {
        return \App\Models\Website::where('id', $id)->first();
    }

    public function add($request)
    {
        $domain = $request->input('domain') ?? '';

        $website = new Website;
        $website->domain = $domain;

        $website->save();
    }

    public function edit($request, $id)
    {
        $website = Website::find($id);
        $website->domain = $request->input('domain') ?? '';
        if ($request->input('created_at')) {
            $website->created_at = $request->input('created_at');
        }

        $website->save();
    }
}
