@extends('layouts.admin-app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header" style="margin-bottom: 0;">
            <div class="text-left mr-auto">
                <h1>{{ $title }}</h1>
            </div>
            <div class="text-right ml-auto">
                <form class="form-inline">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search teams" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="section-body">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <h2 class="section-title">
                        List of all players
                    </h2>
                    <div class="text-center">
                        <a href="{{ route('players.create') }}" class="btn btn-primary"><i
                                class="fas fa-plus fa-lg"></i>
                            Register Player
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($players->count() <= 0) <div class="col-md-12">
                    <div class="text-center">
                        <p class="lead">There is no data available.</p>
                    </div>
            </div>
            @else
            @foreach($players as $player)
            <div class="col-md-4 col-sm-12 mb-4">
                <a href="{!! route('players', $player->slug) !!}" class="card-link">
                    <div class="card shadow h-100">
                        <img src="{{ url('assets') }}/img/box-300x135-medium.jpg" class="card-img-top" alt="Team logo">
                        <div class="card-body text-center">
                            <h5 class="lead">{!! $player->in_game_nickname !!}</h5>
                            <hr>
                            <p class="text-dark">{!! $player->in_game_id !!}</p>
                            <p class="text-dark">{!! $player->team->first()->name ?? 'Free Agent' !!}</p>
                            <p class="text-dark">
                                @foreach ($player->roles as $role)
                                {!! $role->name !!}{!! $loop->last ? '.' : ',' !!}
                                @endforeach
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                {{ $players->links() }}
            </div>
        </div>
</div>
</section>
</div>
@endsection