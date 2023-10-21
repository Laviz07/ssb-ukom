@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')

    <div class="container" style="margin-top:3rem;">
        <div class="row">
            @if(auth()->user()->role == 'admin')
                <div class="col-2">
                    <a href="{{ url('user') }}" class="text-decoration-none">
                        <div class="card bg-c-blue ">
                            <div class="card-body text-white">
                                <h1 class="text-right"><i class="bi bi-person-fill"></i><span
                                        class="f-right">{{$user}}</span></h1>
                                <h2>User</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-2">
                    <a href="{{url('tim')}}" class="text-decoration-none">
                        <div class="card bg-c-blue ">
                            <div class="card-body text-white">
                                <h1 class="text-right"><i class="bi bi-people-fill"></i><span
                                        class="f-right">{{$tim}}</span></h1>
                                <h2>Tim</h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <div class="col-2">
                <a href="{{url('jadwal')}}" class="text-decoration-none">
                    <div class="card bg-c-blue ">
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-calendar-fill"></i><span
                                    class="f-right">{{$jadwal}}</span>
                            </h1>
                            <h2>Jadwal</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('galeri')}}" class="text-decoration-none">
                    <div class="card bg-c-blue ">
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-image-fill"></i><span
                                    class="f-right">{{$galeri}}</span>
                            </h1>
                            <h2>Galeri</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('berita')}}" class="text-decoration-none">
                    <div class="card bg-c-blue">
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-newspaper"></i><span
                                    class="f-right">{{$berita}}</span>
                            </h1>
                            <h2>Berita</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('log')}}" class="text-decoration-none">
                    <div class="card bg-c-blue">
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-activity"></i><span class="f-right">{{$log}}</span>
                            </h1>
                            <h2>Aktivitas</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    {{-- <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {!! $suratChart->container() !!}
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {!! $jsChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('footer')
    {{-- <script src="{{ $jsChart->cdn() }}"></script>

    {{ $jsChart->script() }}
    <script src="{{ $suratChart->cdn() }}"></script>

    {{ $suratChart->script() }} --}}
@endsection