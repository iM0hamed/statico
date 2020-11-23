@extends('layouts.base')

@section('body')
<div id="app">
    <div class="main-wrapper">
        {{-- Navbar --}}
        <x-admin.navbar />
        {{-- Navbar --}}

        {{-- Sidebar --}}
        <x-admin.sidebar />
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
