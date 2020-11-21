@extends('layouts.admin-app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header" style="margin-bottom: 0;">
            <div class="text-left mr-auto">
                <h1>{{ $title }}</h1>
            </div>
        </div>

        <div class="section-body">
            <div class="container ml-0 mr-0">
                <div class="row justify-content-between align-items-center">
                    <h2 class="section-title">
                        {{ $team->name }}
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Team setting</h4>
                        </div>
                        <form action="{{ route('teams.setting.update', $team->slug) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $team->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Team name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $team->name }}">
                                    @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Team description</label>
                                    <input name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        value="{{ old('description') ?? $team->description }}">
                                    @error('description')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Team Logo</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="logo" name="logo"
                                                onchange="changeLabel()">
                                            <label class="custom-file-label" for="logo" aria-describedby="logo"
                                                id="logoLabel">
                                                Choose your logo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right pt-0">
                                <a href="{{ route('teams.detail', $team->slug) }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('javascript')
<script>
    function changeLabel() {
        let input = document.getElementById('logo');
        let label = document.getElementById('logoLabel');

        if (logo.files.length > 0) {
            label.innerHTML = input.files[0].name;
        }
    }
</script>
@endsection