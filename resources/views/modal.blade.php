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
