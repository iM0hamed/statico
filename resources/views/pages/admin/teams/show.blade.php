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
                        <a href="{{ route('teams.setting', $team->slug) }}" class="btn btn-primary"><i
                                class="fas fa-cogs fa-lg">
                            </i>
                            Team Setting
                        </a>
                        <a href="{{ route('teams.setting', $team->slug) }}" class="btn btn-dark"><i
                                class="fas fa-archive fa-lg">
                            </i>
                            Archive Team
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget shadow">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ url('assets') }}/img/bigetron.png"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Team KDA</div>
                                    <div class="profile-widget-item-value">5.89</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">WWCD</div>
                                    <div class="profile-widget-item-value">172 of 203 matches</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Champion</div>
                                    <div class="profile-widget-item-value">12x</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $team->name }}</div>
                            {{ $team->description }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card shadow">
                        <div class="card-header bg-secondary">
                            <h4 class="lead">Rosters</h4>
                            <div class="ml-auto">
                                <a href="{{ route('teams.roster', $team->slug) }}" class="btn btn-primary"><i
                                        class="fas fa-random"></i> Manage Roster</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                @foreach($team->players as $player)
                                <div class="col-md-12 col-sm-12 col-lg-6">
                                    <div class="card profile-widget shadow">
                                        <div class="profile-widget-header">
                                            <img alt="image" src="{{ url('assets') }}/img/avatar/avatar-1.png"
                                                class="rounded-circle profile-widget-picture">
                                            <div class="profile-widget-items">
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Avg. Kills</div>
                                                    <div class="profile-widget-item-value">5.49</div>
                                                </div>
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Highest Damage</div>
                                                    <div class="profile-widget-item-value">1931</div>
                                                </div>
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Avg. Rating</div>
                                                    <div class="profile-widget-item-value">7.4</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-widget-description text-center">
                                            <div class="profile-widget-name">{{ $player->in_game_nickname }} <div
                                                    class="text-muted d-inline font-weight-normal">
                                                    <div class="slash"></div> Player Roles
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<!-- <ul class="list-group list-group-flush">
@foreach($team->players as $player)
<li class="list-group-item">{{ $player->in_game_nickname }}</li>
@endforeach
</ul> -->