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
                        <input class="form-control" type="search" placeholder="Search players" aria-label="Search">
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
                @if ($players->count() <= 0) 
            <div class="col-md-12">
                <div class="text-center">
                    <p class="lead">There is no data available.</p>
                </div>
            </div>
            @else
            @foreach($players as $player)
            <div class="col-md-4">
                <a href="{{ route('players.detail', $player->slug) }}" class="card-link">
                    <div class="card profile-card-1 shadow">
                        <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb"
                            alt="profile-sample1" class="background" />
                        <img src="{{ $player->image == null ? url('assets/' . 'img/avatar/avatar-1.png') : asset('storage/' . $player->image->image) }}" alt="profile-image" class="profile" />
                        <div class="card-content">
                            <h2 class="text-light">{!! $player->in_game_nickname !!}
                                @foreach ($player->roles as $role)
                                <small>{!! $role->name !!}</small>
                                @endforeach
                            </h2>
                            <div class="icon-block">
                                <a href="#" class="text-light">{{ $player->team->first()->name ?? 'Free Agent' }}</i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
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
