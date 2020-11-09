<?php

namespace App\Services;

class WebsitesService
{
    public function listAll()
    {
        return \App\Models\Website::all();
    }
}
