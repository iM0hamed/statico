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
                        Register new player
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Player registration form</h4>
                        </div>
                        <form action="{{ route('players.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="in_game_id">in-Game ID</label>
                                    <input type="text" name="in_game_id" id="in_game_id"
                                        class="form-control @error('in_game_id') is-invalid @enderror"
                                        value="{{ old('in_game_id') }}">
                                    @error('in_game_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="in_game_nickname">in-Game Nickname</label>
                                    <input name="in_game_nickname" id="in_game_nickname"
                                        class="form-control @error('in_game_nickname') is-invalid @enderror"
                                        value="{{ old('in_game_nickname') }}">
                                    @error('in_game_nickname')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="roles">Roster</label>
                                    <select name="roles[]" id="roles"
                                        class="form-control rosters @error('roles') is-invalid @enderror" multiple>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right pt-0">
                                <a href="{{ route('teams') }}" class="btn btn-secondary">Cancel</a>
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
    $(document).ready(function () {
        $(".rosters").select2({
            theme: 'classic'
        });
    });

</script>
@endsection