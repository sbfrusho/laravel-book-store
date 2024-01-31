@extends('layout')
@section('page-content')

<h1>Bookstore</h1>
    <table class="table table-bordered table-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>ISBN</th>
            <th>Stock</th>
        </tr>
        
        <tr>
            <td>{{$book -> id}}</td>
            <td>{{$book -> title}}</td>
            <td>{{$book -> author}}</td>
            <td>{{$book -> price}}</td>
            <td>{{$book -> isbn}}</td>
            <td>{{$book -> stock}}</td>

        </tr>
    </table>
    <p>
        <a href="{{route('books.index')}}"><button type="button" class="btn btn-primary">Go back</button></a>
        <a href="{{route('books.edit',$book->id)}}"><button type="button" class="btn btn-danger">Edit</button></a>
    
    </p>

@endsection