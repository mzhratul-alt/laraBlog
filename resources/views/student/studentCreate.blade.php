@extends('../template')

@section('pageHeader')
   <h2>Student</h2>
@endsection


@section('innerContent')
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card mb-4">
               <h2 class="card-header">Add New Student</h2>
               <div class="card-body">
                   @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                   @endif

                   <form action="{{route('student.store')}}" method="post" class="row justify-content-center">
                       @csrf
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-3" value="{{ old('stdName') }}" name="stdName" placeholder="Student Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control mb-3" value="{{old('stdEmail')}}" name="stdEmail" placeholder="Student Email">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control mb-3" value="{{old('stdPhone')}}" name="stdPhone" placeholder="Student Phone">
                        </div>
                        <div class="col-12 text-center">
                            <input type="submit" value="Add Student" class="btn btn-success">
                        </div>
                   </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
