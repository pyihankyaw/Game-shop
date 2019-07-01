@extends('layouts.app')

@section('content')
    <div class="container">
        <div class= "row">
            <div class ="col">
                <h3>Category List</h3>
            </div>
            <div class ="col">
                <a href="{{route('categories.create')}}" class="btn btn-primary">Add</a>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                         <th>Name</th>
                         <th>     </th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($categories as $category)

                    <tr>
                        <td>{{$category-> name}}</td>
                        <td>
                            <a href ="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
            </div>
        </div>
    </div>
    
@endsection