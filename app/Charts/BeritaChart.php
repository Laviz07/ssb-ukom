<?php

namespace App\Charts;

use App\Models\Berita;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BeritaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $beritas = Berita::all();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $data = [];

        foreach ($months as $month) {
            $beritasInMonth = $beritas->filter(function ($berita) use ($month) {
                $idBerita = $berita->id_berita;
                $formattedMonth = date('F', strtotime($idBerita));

                return $formattedMonth === $month;
            });

            $data[] = $beritasInMonth->count();
        }

        return $this->chart->barChart()
            ->setTitle('Berita Bulanan')
            ->setSubtitle(date('Y'))
            ->setWidth(500)
            ->setHeight(444)
            ->addData('Berita', $data)
            ->setXAxis($months);
    }
}