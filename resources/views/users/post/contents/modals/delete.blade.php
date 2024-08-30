<div class="modal fade" id="delete-post-{{$post->id}}">
  <div class="modal-dialog">
    <div class="modal-content border-daanger">
      <div class="modal-header border-dang">
        <h3 class="h5 modal-title text-dang">
          <i class="fa-solid fa-circle-exclamation"></i>Delete Post
        </h3>

      </div>

      <div class="modal-body">
        <p>Are you sure you want to delete this post?</p>
        <div class="mt-3">
          <img src="{{$post->image}}" alt="Post ID" class="image-lg">
          <p class="mt-1 text-muted">{{$post->description}}</p>
        </div>
      </div>

      <div class="modal-footer border-0">
        <form action="{{route('post.destroy',$post->id)}}" method="post">
          @csrf
          @method('DELETE')

        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cansel</button>
        <button type="submit" class="btn btn-dange btn-sm">Delete</button>
        
        


        </form>
      </div>
    </div>
  </div>
</div>