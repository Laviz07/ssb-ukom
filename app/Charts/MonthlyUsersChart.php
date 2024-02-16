<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\UserController;

class MonthlyUsersChart
{
    protected $chart;
    protected $userController;

    public function __construct(LarapexChart $chart,  UserController $userController)
    {
        $this->chart = $chart;
        $this->userController = $userController;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $userStatusCount = $this->userController->getUserStatusCount();
        $activeUsers = $userStatusCount['active_users'];
        $inactiveUsers = $userStatusCount['inactive_users'];

        return $this->chart->pieChart()
            ->setTitle('User Paling Aktif dan Tidak Aktif')
            ->addData([
                $activeUsers, 
                $inactiveUsers])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setLabels(['Active users', 'Inactive users']);
    }
}
