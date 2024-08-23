<?php

namespace App\Charts;

use App\Models\Mitra;
use App\Models\Program;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MitraDanProgram
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $mitra = Mitra::get();
        $namaMitra = $mitra->pluck('nama')->toArray();

        foreach ($mitra as $item) {
            $program = Program::where('mitra_id', $item->id)->get();
            $jumlahProgram = $program->count();
            $countProgram[] = number_format($jumlahProgram, 0);

        }

        return $this->chart->barChart()
            ->setTitle('Program')
            ->setSubtitle('Banyak program yang dilakukan mitra')
            ->addData('Program', $countProgram)
            ->setXAxis($namaMitra);
    }
}
