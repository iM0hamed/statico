@extends('layouts.base')

@section('body')
<div id="app">
    <div class="main-wrapper">
        {{-- Navbar --}}
        <x-player.navbar />
        {{-- Navbar --}}

        {{-- Sidebar --}}
        <x-player.sidebar />
        {{-- Sidebar --}}

        {{-- Contents --}}
        @yield('content')
        {{-- Contents --}}

        {{-- Footer --}}
        <x-footer />
        {{-- Footer --}}
    </div>
</div>
@endsection
