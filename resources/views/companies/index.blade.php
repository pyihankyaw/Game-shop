@extends('layouts.app')

@section('content')
    <div class="container">
        <div class= "row">
            <div class ="col">
                <h3>Company List</h3>
            </div>
            <div class ="col">
                <a href="{{route('companies.create')}}" class="btn btn-primary">Add</a>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                         <th>Name</th>
                         <th>     </th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($companies as $company)

                    <tr>
                        <td>{{$company-> name}}</td>
                        <td>
                            <a href ="{{route('companies.edit', $company->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('companies.destroy', $company->id)}}" method="post">
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