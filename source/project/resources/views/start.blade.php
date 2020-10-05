@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">Standart Vue+Laravel</h2>
        </div>
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">ChartJS: Vue+Laravel</h2>
        </div>
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">Realtime: Vue+Laravel</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups 1">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a type="button" class="btn btn-secondary" href="#1">Example component</a>
                    <a type="button" class="btn btn-secondary" href="#2">Vue->Blade</a>
                    <a type="button" class="btn btn-secondary" href="#3">Vue->Ajax</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups 2">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a type="button" class="btn btn-secondary" href="#4">Line</a>
                    <a type="button" class="btn btn-secondary" href="#5">Pie</a>
                    <a type="button" class="btn btn-warning" href="#6">Trigger</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups 3">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a type="button" class="btn btn-primary" href="#7">ChartJS</a>
                    <a type="button" class="btn btn-primary" href="#8">Chat</a>
                    <a type="button" class="btn btn-primary" href="#9">Private Chat</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="owl-carousel owl-theme mt-5">
                <div class="row m-2" data-hash="1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#1 Example component</h2>
                                <example-component></example-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#2 Передача данных в Vue из Blade</h2>
                                <prop-component v-bind:urldata="{{ json_encode($url_data) }}"></prop-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#3 Ajax</h2>
                                <ajax-component></ajax-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#4 ChartJS (Line) & VueJS *ajax</h2>
                                <chartline-component></chartline-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#5 ChartJS (Pie) & VueJS *ajax</h2>
                                <chartpie-component></chartpie-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="6">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#6 ChartJS (Trigger) & VueJS *ajax</h2>
                                <chartrandom-component></chartrandom-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="7">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#7 REALTIME ChartJS (Line) & VueJS *ajax+trigger+reload</h2>
                                <socket-component></socket-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="8">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#8 REALTIME Chat VueJS *ajax+trigger+reload</h2>
                                <socket-chat-component></socket-chat-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-2" data-hash="9">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 500px;">
                                <h2 class="text-center">#9 REALTIME Private Chat VueJS *ajax+trigger+reload</h2>
                                @if(Auth::check())
                                    <h4 class="text-center">пользователь: {{ Auth::user()->email }}</h4>
                                    <socket-private-chat-component
                                        :users="{{ \App\User::select('email', 'id')->where('id', '!=', Auth::id())->get() }}"
                                        :user="{{ Auth::user() }}">
                                    </socket-private-chat-component>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
