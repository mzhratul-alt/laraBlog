@extends('template')
@extends('modal')

@section('pageHeader')
   <h1>Categories</h1>
@endsection

@section('innerContent')
   <div class="container">
      <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addNewCategory">
         Add New Category
      </button>
      <div class="row">
         <div class="col-12">
            <div class="card mb-4">
               <h2 class="card-header">All Categories</h2>
               <div class="card-body">
                  <table class="table table-primary text-center table-striped table-hover table-bordered">
                     <thead>
                        <tr>
                           <th>Sl. No.</th>
                           <th>Categori Name</th>
                           <th>Slug</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
