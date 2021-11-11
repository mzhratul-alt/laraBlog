<div class="modal" id="addNewCategory">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5>Add New Category</h5>
            <button type="button" class="close btn btn-primary" data-bs-dismiss="modal">
               <span>x</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{route('store.category')}}" class="row" method="post">
                @csrf
                <div class="col-6">
                    <input type="text" class="form-control mb-3" name="name" placeholder="Your Category Name">
                </div>
                <div class="col-6">
                    <input type="text" class="form-control mb-3" name="slug" placeholder="Slug Name">
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="modal" id="addNewPost">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5>Add New Post</h5>
            <button type="button" class="close btn btn-primary" data-bs-dismiss="modal">
               <span>x</span>
            </button>
         </div>
         <div class="modal-body">
            <form class="row mb-4" method="post" action="{{url('post/store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control" name="title" placeholder="Post Title">
                </div>
                <div class="col-md-6 mb-4">
                    <select id="" class="form-select" name="category_id">
                        <option value="" selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-4">
                    <textarea name="details" placeholder="Description" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="submit" class="btn btn-success btn-sm w-100" value="Add Post" name="image">
                </div>
            </form>
         </div>
      </div>
   </div>
</div>
