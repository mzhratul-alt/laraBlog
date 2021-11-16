@extends('../template')

@section('pageHeader')
   <h2>{{ $singlePost->title }}</h2>
@endsection

@section('innerContent')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-6">
            <a href="{{url('post')}}" class="btn btn-primary my-4">View all posts</a>
            <div class="card mb-3">
               <img src="{{ asset($singlePost->image) }}" class="card-img-top" alt="">
               <div class="card-body">
                  <h5 class="card-title">{{ $singlePost->title }}</h5>
                  <p class="card-text">{{ $singlePost->details }}</p>
                  <p class="card-text"><small class="text-muted">#{{ $singlePost->name }}</small></p>
               </div>
            </div>
           </div>
       </div>
   </div>
@endsection
