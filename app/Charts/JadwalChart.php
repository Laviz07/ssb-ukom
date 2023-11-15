<?php

namespace App\Charts;


use App\Models\Jadwal;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JadwalChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $jadwals = Jadwal::all();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $data = [];

        foreach ($months as $month) {
            $jadwalsInMonth = $jadwals->filter(function ($jadwal) use ($month) {
                $idJadwal = $jadwal->id_berita;
                $formattedMonth = date('F', strtotime($idJadwal));

                return $formattedMonth === $month;
            });

            $data[] = $jadwalsInMonth->count();
        }

        return $this->chart->barChart()
            ->setTitle('Jadwal Bulanan')
            ->setSubtitle(date('Y'))
            ->setWidth(500)
            ->setHeight(444)
            ->addData('Berita', $data)
            ->setXAxis($months);
    }
}
