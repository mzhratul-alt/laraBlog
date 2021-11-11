@extends('template')
@extends('modal')

@section('pageHeader')
   <h1>Categories</h1>
@endsection

@section('innerContent')
   <div class="container">
      <a class="btn btn-info mb-4" href="{{url('categories')}}">All Categories</a>
      <div class="row">
         <div class="col-12">
            <div class="card mb-4">
               <h2 class="card-header"><small>Category Name:</small> {{$category->name}}</h2>
               <div class="card-body">
                   <p><b>Slug Name:</b> {{$category->slug}}</p>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
