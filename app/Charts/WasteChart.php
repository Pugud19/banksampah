<?php

namespace App\Charts;

use App\Models\Waste;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class WasteChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function build()
    {
        $wasteData = Waste::all(); // Replace 'berat' with your database column name

        // $this->labels($wasteData->pluck('jenis_sampah'));
        // $this->dataset('Waste Amount', 'bar', $wasteData->pluck('total_harga'))->backgroundColor('rgba(75, 192, 192, 0.2)');
        if ($wasteData->isNotEmpty()) {
            $this->labels($wasteData->pluck('name'));
            $this->dataset('Data Sampah', 'bar', $wasteData->pluck('total_harga'))->backgroundColor('rgba(75, 192, 192, 0.2)');
        } else {
            // Handle the case where there is no data in the database
            // You can set a default dataset or handle this scenario as needed
        }
    }
}
