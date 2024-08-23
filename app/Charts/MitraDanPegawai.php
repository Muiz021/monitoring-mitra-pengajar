<?php

namespace App\Charts;

use App\Models\Mitra;
use App\Models\Pelajar;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MitraDanPegawai
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user = Auth::user();
        $mitra = Mitra::count();
        $pelajar = Pelajar::count();

        if ($user->roles == 'admin') {
            return $this->chart->pieChart()
                ->setTitle('Jumlah User')
                ->setSubtitle('Mitra dan Pelajar')
                ->addData([$mitra, $pelajar])
                ->setLabels(['Mitra', 'Pelajar']);
        } else {
            return $this->chart->pieChart()
                ->setTitle('Jumlah User')
                ->setSubtitle('Mitra')
                ->addData([$mitra])
                ->setLabels(['Mitra']);
        }
    }
}
