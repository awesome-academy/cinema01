<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class MovieChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->options([
            'legend' => [
                'display' => true,
                'labels' => [
                    'fontColor' => 'rgb(255, 99, 132)',
                ],
            ],
        ]);
    }
}
