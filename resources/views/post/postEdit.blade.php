@extends('../template')

@section('pageHeader')
   <h2>Post Edit</h2>
@endsection


@section('innerContent')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <a class="btn btn-info mb-4" href="{{url('post')}}">All Posts</a>
            <form class="row mb-4" method="post" action="{{ url('post/update/'.$singlePost->id) }}" enctype="multipart/form-data">
               @csrf
               <div class="col-md-6 mb-4">
                  <input type="text" class="form-control" name="title" value="{{ $singlePost->title }}">
               </div>
               <div class="col-md-6 mb-4">
                  <select id="" class="form-select" name="category_id">
                     <option value="" selected>Select Category</option>
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{($category->id == $singlePost->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-md-12 mb-4">
                  <textarea name="details" placeholder="" class="form-control">{{ $singlePost->details }}</textarea>
               </div>
               <div class="col-md-4 mb-4">
                  <input type="file" class="form-control" name="image">
                  <input type="hidden" name="oldPhoto" value="{{ $singlePost->image }}">
               </div>
               <div class="col-md-3 mb-4">
                  <img src="{{asset($singlePost->image)}}" height="100" alt="">
               </div>
               <div class="col-md-5 mb-4">
                  <input type="submit" class="btn btn-success btn-sm w-100" value="Update Post" name="image">
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
