<div class="mt-3">

  @if($post->comments->isNotEmpty())
    <hr>
    <ul class="list-group">
        @foreach($post->comments->take(3) as $comment)
           <li class="list-group-item border-0 p-0 mb-2">
            <a href="" class="text-decoration-none text-dark fw-bold">{{$comment->user->name}}</a>
             &nbsp;
             <p class="d-inline fw-light">{{$comment->body}}</p>

             <form action="{{route('comment.destroy',$comment->id)}}" method="post">
               @csrf
               @method('DELETE')

               <span class="text-uppercase text-muted xsmall ">{{date('M d,Y',strtotime($comment->created_at))}}
               </span>

               @if (Auth::user()->id === $comment->user->id)
                  &middot;
                  <button type="submit" class="border-0 bg-transparent text-danger p-0 xsmall">Delete</button>
               @endif
               </form>
               </li>
               @endforeach

               @if($post->comments->count() > 3)
                  <li class="list-group-item border-0 px-0 pt-0">
                    <a href="{{route('post.show',$post->id)}}" class="text-decoration-none small">
                      View all {{$post->comments->count()}} comments
                    </a>
                  </li>
                @endif
    </ul>
  @endif

  <form action="{{ route('comment.store', $post->id) }}" method="post">
    @csrf
    <div class="input-group">
      <textarea name="body" id="body" rows="1" class="form-control form-control-sm" placeholder="Add a comment..."></textarea>
      <button type="submit" class="btn btn-outline-secondary">
        <i class="fa-regular fa-paper-plane"></i>
      </button>
    </div>
  </form>

</div>