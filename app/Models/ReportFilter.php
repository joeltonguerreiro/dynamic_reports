<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportFilter extends Model
{
    public function reportMeta()
    {
        return $this->belongsTo('App\Models\ReportMeta');
    }
}
