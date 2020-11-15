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
            <div class="container">
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
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Team name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">Team description</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="players">Players</label>
                                    <select name="players" id="players" class="form-control select2" multiple>
                                        <option value="Player 1">Player 1</option>
                                        <option value="Player 2">Player 2</option>
                                        <option value="Player 3">Player 3</option>
                                        <option value="Player 4">Player 4</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="card-footer text-right pt-0">
                                <button class="btn btn-secondary">Cancel</button>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
