<div class="container p-0">
  <a href="{{route('post.show',$post->id)}}">
    <img src="{{$post->image}}" alt="Post ID {{$post->id}}" class="w-100">
</a>
</div>
<div class="card-body">
  <div class="row align-items-center">
    <div class="col-auto">
      @if($post->isliked())
      <form action="{{route('unlike', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm shadow-none p-0">
          <i class="fa-solid text-danger fa-heart"></i>
        </button>
      </form>
      @else
        <form action="{{route('like', $post->id)}}" method="post">
          @csrf
          <button type="submit" class="btn btn-sm shadow-none p-0">
             <i class="fa-regular fa-heart"></i>
          </button>
        </form>
            @endif
    </div>

    <div class="col-auto px-0">
            <span>{{ $post->likes->count() }}</span>
        </div>

    

    <div class="col text-end">
    @foreach ($post->category_post as $category_post)
       <div class="badge bg-secondary bg-opacity-50">
         {{ $category_post->category->name }}
       </div>
    @endforeach
    </div>
  </div>

  <a href="" class="text-decoration-none text-dark fw-bold">{{$post->user->name}}</a>
  &nbsp;
  <p class="d-inline fw-light">{{$post->description}}</p>
  <p class="text-uppercase text-muted xsmall ">{{date('M d,Y',strtotime($post->created_at))}}</p>

  @include('users.post.contents.comments')

  
</div>