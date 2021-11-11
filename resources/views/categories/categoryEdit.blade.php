@extends('template')
@extends('modal')

@section('pageHeader')
   <h1>Categories</h1>
@endsection

@section('innerContent')
<div class="container">
    <a class="btn btn-info mb-4" href="{{url('categories')}}">All Categories</a>
    <form action="{{url('category/update/'.$category->id)}}" class="row" method="post">
        @csrf
        <div class="col-6">
           <input type="text" class="form-control mb-3" name="name" value="{{$category->name}}">
        </div>
        <div class="col-6">
           <input type="text" class="form-control mb-3" name="slug" value="{{$category->slug}}">
        </div>
        <div class="col-12">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
     </form>
</div>
@endsection
