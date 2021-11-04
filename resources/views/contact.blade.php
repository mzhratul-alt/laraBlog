@extends('template')

@section('pageHeader')
   <h2>Contact</h2>
@endsection

@section('innerContent')
<div class="container">
    <form action="#" class="row my-4">
        <div class="col-md-6 mb-4">
           <input type="text" class="form-control" placeholder="Your Name">
        </div>
        <div class="col-md-6 mb-4">
            <input type="text" class="form-control" placeholder="Subject">
         </div>
        <div class="col-md-12 mb-4">
           <input type="email" class="form-control" placeholder="Your Email">
        </div>
        <div class="col-md-12 mb-4">
           <textarea name="" id="" placeholder="Your Message" class="form-control"></textarea>
        </div>

     </form>
</div>
@endsection
