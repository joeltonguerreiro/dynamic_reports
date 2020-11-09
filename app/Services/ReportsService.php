<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ReportsService
{
    public function listAll()
    {
        return \App\Models\Report::all();
    }
    public function get(int $id)
    {
        return \App\Models\Report::where('id', $id)->first();
    }

    /**
     * Return the columns part of sql, using the meta linked linked on the report registration.
     */
    public function getColumns($report, $subsql)
    {
        $reportMetas = $report->reportMetas()->with('meta')->get()->toArray();

        // used to define the base model of this sql
        // todo: implements the join when has two or more diferente models
        $sqlModels = [];

        $firstColumn = true;
        foreach ($reportMetas as $reportMeta) {
            // if not is the first column, a comma is concatened on the string
            if (!$firstColumn) {
                $subsql .= ', ';
            }
            // extracting the meta name and label to use on the script
            $subsql .= "{$reportMeta['meta']['name']} as \"{$reportMeta['meta']['label']}\"";

            if ($firstColumn) {
                $firstColumn = false;
            }

            $sqlModels[] = $reportMeta['meta']['model'];
        }

        array_unique($sqlModels);

        $baseModel = current($sqlModels);

        // define the base model of this sql
        $subsql .= " from ${baseModel}s ";

        return $subsql;
    }

    /**
     * Return the filters expressions of the sql.
     */
    public function getFilters($report, $subsql)
    {
        $reportFilters = $report->reportMetas()->with('reportFilters.reportMeta.meta')->get()->toArray();

        if (count($reportFilters)) {
            $subsql .= " where ";
        }

        foreach ($reportFilters as $reportFilter) {
            $orOpen = false;
            foreach ($reportFilter['report_filters'] as $filter) {
                // add the or operator on the sql if the or expression is open
                if ($filter['sql_operator'] == 'or' and $orOpen) {
                    $subsql .= " or ";
                }

                // open the or expression
                if ($filter['sql_operator'] == 'or' and !$orOpen) {
                    $subsql .= " ( ";
                    $orOpen = true;
                }

                // when the sql_operator is not or and the or expression is open, close the or expression
                if ($filter['sql_operator'] !== 'or' and $orOpen) {
                    $subsql .= " ) ";
                    $orOpen = false;
                }

                if ($filter['sql_operator'] == 'and') {
                    $subsql .= " and ";
                }

                $meta = $filter['report_meta']['meta'];

                // extract the meta name and the comparison_rule expression
                $comparisonRule = str_replace(':value:', $meta['name'], $filter['comparison_rule']);

                $subsql .= " {$comparisonRule} ";
            }

            if ($orOpen) {
                $subsql .= " ) ";
                $orOpen = false;
            }
        }

        return $subsql;
    }

    /**
     * Build and return the sql script that will be executed to get the information of
     * dynamic report passed by the parameter.
     */
    public function buildReport(int $id)
    {
        $report = \App\Models\Report::where('id', $id)->first();

        $subsql = 'select ';

        $subsql = $this->getColumns($report, $subsql);

        $subsql = $this->getFilters($report, $subsql);

        return DB::select("select sub.* from ({$subsql}) sub");
    }
}
