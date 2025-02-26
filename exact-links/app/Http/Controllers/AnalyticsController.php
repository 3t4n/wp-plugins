<?php

namespace ExactLinks\App\Http\Controllers;

use ExactLinks\App\Models\Link;
use ExactLinks\App\Helpers\Shortner;
use ExactLinks\Framework\Request\Request;
use ExactLinks\App\Models\LinkAnalytics;
use ExactLinks\App\Libs\Csv\CsvWriter;
use ExactLinks\Framework\Support\Arr;
use ExactLinks\App\Libs\Csv\CsvDataProcess;

class AnalyticsController extends Controller
{
    /**
     * get Analytics Data from database
    */
    public function getAnalytics(Request $request, $id)
    {
        return $this->sendSuccess(
            (new LinkAnalytics)->getAnalytics($request, $id)
        );
    }

    public function getAnalyticsDownload(Request $request, $id) 
    { 
        $csvWriter = new CsvWriter();

        $getAnalytics = $this->getAnalytics($request, $id);

        $columns = (new CsvDataProcess)->allColumns(); 
        $data    = (new CsvDataProcess)->allDatas($getAnalytics);

        $csvWriter->insertOne($columns);

        $rows = [];

        foreach ($data as $summary) {
            $row = [];
            foreach ($columns as $key => $column) {
                $row[$key] = $summary[$key];
            }

            $rows[] = $row;
        }
    
        $csvWriter->insertAll($rows);

        $date     = date_format($getAnalytics->data['link']->created_at, "Y-m-d") .'-to-'. date('Y-m-d');
        $fromDate = $request->get('from_date');
        $toDate   = $request->get('to_date');

        if ($fromDate) {
           $fromDate = \DateTime::createFromFormat('Y/m/d', $fromDate);
           $toDate   = \DateTime::createFromFormat('Y/m/d', $toDate);
           $date     = $fromDate->format('Y-m-d') .'-to-'. $toDate->format('Y-m-d');
        }

        $csvWriter->output('exact-links-analytic-' . $date . '.csv');
        die();
    }
}