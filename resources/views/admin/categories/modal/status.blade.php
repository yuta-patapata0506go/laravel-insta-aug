<div class="modal fade" id="hidden-user-{{ $category->id }}">
   <div class="modal-dialog" role="document">
      <div class="modal-content boder-danger">
        <div class="modal-header border-danger">
           <h5 class="modal-title text-danger" id="modalTitleId">
               Hidden User <i class="fa-solid fa-eye-slash"></i>
          </h5>
        </div>
      
        <div class="modal-footer">
           <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
           @csrf
           @method('DELETE')
              <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger btn-sm">Hide</button>
          </form>
       </div>
        </div>
    </div>
</div>

<div class="modal fade" id="visible-user-{{ $category->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content boder-success">
           <div class="modal-header border-success">
              <h5 class="modal-title text-success" id="modalTitleId">
                Visible User <i class="fa-solid fa-eye"></i>
              </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                  <p class="text-muted d-inline">Are you sure to visible id #
                    <span class="fw-bold">{{$category->id}}</span>
                 </p>
              </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.categories.update',$category->id)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">Visible</button>
                </form>
            </div>
        </div>
    </div>
</div>



