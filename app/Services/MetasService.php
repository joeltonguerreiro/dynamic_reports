<?php

namespace App\Services;

class MetasService
{
    public function listAll()
    {
        return \App\Models\Meta::all();
    }
}
