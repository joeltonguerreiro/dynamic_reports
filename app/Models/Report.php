<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function reportMetas()
    {
        return $this->hasMany('App\Models\ReportMeta');
    }
}
