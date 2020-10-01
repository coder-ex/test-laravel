<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index() {
        $url_data = [
            [
                'title' => 'DKA-DEVELOP',
                'url' => 'https://dka-develop.ru'
            ],
            [
                'title' => 'YouTube',
                'url' => 'https://joutube.com'
            ],
            [
                'title' => 'StackOverFlow',
                'url' => 'https://ru.stackoverflow.com/'
            ]
        ];

        return view('start', [
            'url_data' => $url_data,
        ]);
    }

    public function getJson() {
        return [
            array(
                'title' => 'Google',
                'url' => 'https://google.com'
            ),
            array(
                'title' => 'Yandex',
                'url' => 'https://yandex.ru'
            ),
        ];
    }

    public function chartData() {
        return [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label' => 'Продажи-текущие',
                    'backgroundColor' => '#40A1BF',
                    'data' => [rand(0,5000), rand(0,5000), rand(0,5000), rand(0,5000)],
                ],
                [
                    'label' => 'Продажи-прошлые',
                    'backgroundColor' => '#BFB640',
                    'data' => [rand(0,5000), rand(0,5000), rand(0,5000), rand(0,5000)],
                ],
            ],
        ];
    }

    public function chartPie() {
        return [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label' => 'Продажи',
                    'backgroundColor' => ['#40A1BF', '#40BF88', '#BFB640', '#BF405D'],
                    'data' => [15000, 5000, 10000, 30000],
                ],
            ],
        ];
    }

    public function chartRandom() {
        return [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label' => 'Gold',
                    'backgroundColor' => '#F5CA3F',
                    'data' => [rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
                ],
                [
                    'label' => 'Silver',
                    'backgroundColor' => '#ACACAC',
                    'data' => [rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)],
                ],
            ],
        ];
    }
}
