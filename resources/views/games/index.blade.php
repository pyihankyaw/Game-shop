@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Games</h3>
            </div>
            <div class="col">
                <a href="{{route('games.create')}}" class="btn btn-primary">Add</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Platforms</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td>{{$game->id}}</td>
                                <td>{{$game->name}}</td>
                                <td>{{$game->year}}</td>
                                <td>{{$game->company->name}}</td>
                                <td>{{$game->category->name}}</td>
                                <td>
                                     @foreach($game->platforms as $platform)
                                        <span class="badge badge-primary" >{{$platform->name}}</span>
                                     @endforeach
                                </td>
                                <td>
                                    <a herf="{{route('games.edit', $game->id)}}" class="btn btn-primary">Edite</a>
                                    <form action="{{route('games.destroy', $game->id)}}" method="post">
                                        @csrf
                                        <button type='submite' class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{$games->links()}}
            </div>
        </div>
</div>
 @endsection