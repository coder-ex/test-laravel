<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return json_encode([
            [
                'title' => 'Google',
                'url' => 'https://google.com'
            ],
            [
                'title' => 'Yandex',
                'url' => 'https://yandex.ru'
            ],
        ], JSON_UNESCAPED_UNICODE);
    }

    public function chartData() {
        return json_encode([
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
        ], JSON_UNESCAPED_UNICODE);
    }

    public function chartPie() {
        return json_encode([
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label' => 'Продажи',
                    'backgroundColor' => ['#40A1BF', '#40BF88', '#BFB640', '#BF405D'],
                    'data' => [15000, 5000, 10000, 30000],
                ],
            ],
        ], JSON_UNESCAPED_UNICODE);
    }

    public function chartRandom() {
        return json_encode([
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
        ], JSON_UNESCAPED_UNICODE);
    }

    public function newEvent(\Illuminate\Http\Request $request) {
        $result = [
            'labels' => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label' => 'Продажи',
                    'backgroundColor' => ['#40A1BF', '#40BF88', '#BFB640', '#BF405D'],
                    'data' => [15000, 5000, 10000, 30000],
                ],
            ],
        ];

        if($request->has('label')) {
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = (integer)$request->input('sale');

            if($request->has('realtime')) {
                if(filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
                    event(new \App\Events\NewEvent($result));
                }
            }
        }

        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function sendMessage(\Illuminate\Http\Request $request) {
        event(new \App\Events\NewMessage($request->input('message')));
    }

    public function sendPrivateMessage(\Illuminate\Http\Request $request) {
        //event(new \App\Events\PrivateMessage($request->input('message')));
        \App\Events\PrivateMessage::dispatch($request->all());

        return $request->all();
    }
}
