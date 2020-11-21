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
                        <a href="{{ route('players.setting', $player->slug) }}" class="btn btn-primary">
                            <i class="fas fa-cogs fa-lg"></i> Player Setting
                        </a>
                        <a href="{{ route('players.setting', $player->slug) }}" class="btn btn-dark">
                            <i class="fas fa-archive fa-lg"></i> Deactive
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget shadow">
                        <div class="profile-widget-header">
                            <img alt="image"
                                src="{{ $player->image == null ? url('assets/' . 'img/avatar/avatar-1.png') : asset('storage/' . $player->image->image) }}"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">KDA</div>
                                    <div class="profile-widget-item-value">5.89</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Avg. Damage</div>
                                    <div class="profile-widget-item-value">761 Damage</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Win rate (%)</div>
                                    <div class="profile-widget-item-value">51%</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $player->in_game_nickname }}</div>
                            @foreach ($player->roles as $role)
                            {!! $role->name !!}{{ $loop->last ? '.' : ' / ' }}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection