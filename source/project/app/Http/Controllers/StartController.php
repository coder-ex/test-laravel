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
}
