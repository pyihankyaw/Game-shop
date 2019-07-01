@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Create New Game</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('games.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number"  min="1990" name="year" id="year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="game_id">Game</label>
                                    <select name ="game_id" id="game_id" class="form-control" required>
                                     @foreach($games as $game)
                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                     @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name ="category_id" id="category_id" class="form-control" required>
                                     @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                     @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="platforms[]">Platforms</label>
                                    <select name ="platforms[]" id="platforms[]" class="form-control" multiple>
                                     @foreach($platforms as $platform)
                                        <option value="{{$platform->id}}">{{$platform->name}}</option>
                                     @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <button class="btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection