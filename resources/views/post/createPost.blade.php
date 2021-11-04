@extends('../template')


@section('pageHeader')
<h2>Create New Post</h2>
@endsection


@section('innerContent')
<div class="container">
    <form class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Post Title">
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="">
        </div>
    </form>
</div>
@endsection
