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
                        List of all teams
                    </h2>
                    <div class="text-center">
                        <a href="{{ route('teams.create') }}" class="btn btn-primary"><i class="fas fa-plus fa-lg"></i>
                            Create
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($teams->count() <= 0) <div class="col-md-12">
                    <div class="text-center">
                        <p class="lead">There is no data available.</p>
                    </div>
            </div>
            @else
            @foreach($teams as $team)
            <div class="col-md-4 col-sm-12 mb-4">
                <a href="{{ route('teams') . '/' . $team->slug }}" class="card-link">
                    <div class="card shadow h-100">
                        <img src="{{ url('assets') }}/img/box-300x135-medium.jpg" class="card-img-top" alt="Team logo">
                        <div class="card-body text-center">
                            <h5 class="lead">{{ $team->name }}</h5>
                            <hr>
                            <p class="text-dark">{{ $team->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                {{ $teams->links() }}
            </div>
        </div>
</div>
</section>
</div>
@endsection