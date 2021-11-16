@extends('../template')
@extends('modal')

@section('pageHeader')
   <h2>Post</h2>
@endsection


@section('innerContent')
   <div class="container-fluid">
      <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addNewPost">
         Add New Post
      </button>
      <div class="row">
         <div class="col-12">
            <div class="card mb-4">
               <h2 class="card-header">All Posts</h2>
               <div class="card-body">
                   @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                   @endif
                  <table class="table table-primary text-center table-striped table-hover table-bordered">
                     <thead>
                        <tr>
                           <th>Sl. No.</th>
                           <th>Post Title</th>
                           <th>Post Description</th>
                           <th>Image</th>
                           <th>Category</th>
                           <th>Created At</th>
                           <th>Updated At</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($posts as $post)
                           <tr>
                              <td>
                                 {{ $loop->iteration }}
                              </td>
                              <td>
                                 {{ $post->title }}
                              </td>
                              <td>
                                 {{ $post->details }}
                              </td>
                              <td>
                                 <img width="100" src="{{asset($post->image)}}" alt="f">
                              </td>
                              <td>
                                 {{ $post->name }}
                              </td>
                              <td>
                                 {{ $post->created_at }}
                              </td>
                              <td>
                                 {{ $post->updated_at }}
                              </td>
                              <td>
                                 <a href="{{ url('post/view/' . $post->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-binoculars"></i>
                                 </a>
                                 <a href="{{ url('post/edit/' . $post->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                 </a>
                                 <a href="{{ url('post/delete/' . $post->id) }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
