<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportMeta extends Model
{
    public function meta()
    {
        return $this->belongsTo('App\Models\Meta');
    }

    public function report()
    {
        return $this->belongsTo('App\Models\Report');
    }

    public function reportFilters()
    {
        return $this->hasMany('App\Models\ReportFilter');
    }
}
