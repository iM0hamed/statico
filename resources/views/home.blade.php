@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hello') }}</div>

                <div class="card-body">
                    {{ __('Your first page!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection