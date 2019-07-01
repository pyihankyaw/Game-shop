@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Edit </h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('games.update', $game->id)}}" method="POST">
                    @csrf
                    @method("put")
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{$->name}}" id="name" class="form-control">
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