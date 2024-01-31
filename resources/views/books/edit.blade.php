@extends('layout')
@section('page-content')

<h2>Update Book</h2>
<form method="post" action="{{route('books.update')}}">
  @csrf
  <input type="hidden" name="id" value="{{$book->id}}">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{old('title' , $book->title)}}" class="form-control" placeholder="Enter title">
    <div>{{$errors->first('title')}}</div>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" value="{{old('author' , $book->author)}}" class="form-control" placeholder="Enter the author name">
    <div>{{$errors->first('author')}}</div>
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="text" name="price" value="{{old('price' , $book->price)}}" class="form-control" placeholder="Enter the price">
    <div>{{$errors->first('price')}}</div>
  </div>
  <div class="form-group">
    <label>ISBN</label>
    <input type="text" name="isbn" value="{{old('isbn' , $book->isbn)}}" class="form-control" placeholder="ISBN">
    <div>{{$errors->first('isbn')}}</div>
  </div>
  <div class="form-group">
    <label>Stock</label>
    <input type="text" name="stock" value="{{old('stock' , $book->stock)}}" class="form-control" placeholder="ISBN">
    <div>{{$errors->first('stock')}}</div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('books.index')}}"><button type="button" class="btn btn-danger">Previous</button></a>
  

</form>

@endsection