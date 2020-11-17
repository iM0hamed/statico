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
                        Create new team
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Team registration form</h4>
                        </div>
                        <form action="{{ route('teams.roster.update', $team->slug) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="players">Roster</label>
                                    <select name="players[]" id="players" class="form-control rosters" multiple>
                                        @foreach ($players as $key => $player)
                                            <option value="{{ $player->id }}" @if($team->players->containsStrict('id', $player->id)) selected @endif>{{ $player->in_game_nickname }}</option>
                                        @endforeach
                                    </select>
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
    $(document).ready(function() {
        $(".rosters").select2({
            maximumSelectionLength: 6,
            formatSelectionTooBig: function(limit) {
                return 'Too many selected items';
            }
        });
    });
</script>
@endsection