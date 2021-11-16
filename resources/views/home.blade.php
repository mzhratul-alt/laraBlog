@extends ('template')

@section('pageHeader')
   <h1>Clean Blog</h1>
@endsection

@section('innerContent')
   <!-- Main Content-->
   <div class="container px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
         <div class="col-md-10 col-lg-8 col-xl-7">

            @foreach ($posts as $post)
               <!-- Post preview-->
               <div class="post-preview">
                  <a href="url('post/view/'.$post->id)">
                     <img src="{{asset($post->image)}}" width="200" alt="">
                     <h2 class="post-title">{{$post->title}}</h2>
                     <p class="post-subtitle">
                         {{$post->details}}
                     </p>
                  </a>
                  <p class="post-meta">
                     Posted by
                     <a href="#!">{{$post->name}}</a>
                     {{$post->created_at}}
                  </p>
               </div>
               <!-- Divider-->
               <hr class="my-4" />
            @endforeach
            <!-- Pager-->
            {{$posts->links()}}
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                  Posts →</a></div>
         </div>
      </div>
   </div>

@endsection
