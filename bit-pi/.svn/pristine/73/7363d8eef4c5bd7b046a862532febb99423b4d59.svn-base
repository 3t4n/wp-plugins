<?php

namespace BitApps\Pi\HTTP\Controllers;

use BitApps\Pi\Config;
use BitApps\Pi\Deps\BitApps\WPKit\Http\Response;
use BitApps\Pi\Model\Flow;
use BitApps\Pi\Model\FlowHistory;

final class DashboardController
{
    public function index()
    {
        // TODO: Implement year wise filter

        // $validated = $request->validate([
        //     'year' => ['nullable', 'integer'],
        // ]);

        $topExecutedFlows = Flow::select(['id', 'run_count', 'title'])
            ->orderBy('run_count')
            ->desc()
            ->take(3)
            ->get();

        $flowHistoryTable = Config::withDBPrefix('flow_histories');

        $flowTable = Config::withDBPrefix('flows');

        $recentFlowHistories = FlowHistory::leftJoin('flows', "{$flowTable}.id", '=', "{$flowHistoryTable}.flow_id")
            ->orderBy('id')
            ->desc()
            ->take(5)
            ->get([
                "{$flowHistoryTable}.id",
                "{$flowTable}.title",
                "{$flowHistoryTable}.status",
                "{$flowHistoryTable}.created_at",
            ]);

        return Response::success([
            'topExecutedFlows'      => $topExecutedFlows,
            'recentFlowHistories'   => $recentFlowHistories,
            'monthlyFlowExecutions' => $this->getMonthlyFlowExecutions(),
        ]);
    }

    private function getMonthlyFlowExecutions()
    {
        $monthLabels = [
            [
                'month' => 'January',
            ],
            [
                'month' => 'February',
            ],
            [
                'month' => 'March',
            ],
            [
                'month' => 'April',
            ],
            [
                'month' => 'May',
            ],
            [
                'month' => 'June',
            ],
            [
                'month' => 'July',
            ],
            [
                'month' => 'August',
            ],
            [
                'month' => 'September',
            ],
            [
                'month' => 'October',
            ],
            [
                'month' => 'November',
            ],
            [
                'month' => 'December',
            ],
        ];

        $monthlyFlowExecutions = FlowHistory::select('COUNT(id) AS run_count', 'MONTH(created_at) AS month')
            ->groupBy('month')
            ->orderBy('month')
            ->where('YEAR(created_at)', gmdate('Y'))
            ->get();

        foreach ($monthLabels as $key => $label) {
            foreach ($monthlyFlowExecutions as $monthlyFlowExecution) {
                if ($label['month'] === gmdate('F', gmmktime(0, 0, 0, $monthlyFlowExecution['month'], 1))) {
                    $monthLabels[$key]['run_count'] = $monthlyFlowExecution['run_count'];
                }
            }
        }

        return $monthLabels;
    }
}
