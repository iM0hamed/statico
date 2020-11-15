@extends('layouts.admin-app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header" style="margin-bottom: 0;">
            <h1>{{ $title }}</h1>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <h2 class="section-title">
                        Overview
                    </h2>
                    <div class="text-center">
                        <a href="{{ route('teams.create') }}" class="btn btn-primary"><i
                                class="fas fa-cogs fa-lg"></i>
                            Options
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <img src="{{ url('assets') }}/img/box-300x135-medium.jpg" class="card-img-top"
                            alt="Team logo">
                        <div class="card-body">
                            <h5 class="lead">{{ $team->name }}</h5>
                            <hr>
                            @foreach($team->players as $player)
                                <p class="text-dark">{{ $player->in_game_nickname }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-8"></div>
            </div>
        </div>
    </section>
</div>
@endsection