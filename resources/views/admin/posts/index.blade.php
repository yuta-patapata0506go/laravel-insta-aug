@extends('layouts.app')

@section('title','Admin:index')

@section('content')
  <table class="table table-hover  align-middle">
    <thead class="table-sm table-primary">
          <tr>
            <td>ID</td>
            <td></td> 
            <td>CATEGORY</td>
            <td>OWNER</td>
            <td>CREATED AT</td>
            <td>STATUS</td>
            <td></td>
          </tr>
      </thead>
       
  <tbody>
       @foreach ($all_posts as $post)
    <tr>
        <td>
          {{$post->id}}
        </td>
        <td>
          <a href="{{route('post.show',$post->id)}}">
            <img src="{{ $post->image }}" alt="" class="img-thumbnail avatar-lg">
         </a>
       </td>
       <td>
       @foreach ($post->category_post as $category_post)
          <div class="badge bg-secondary bg-opacity-50">
            {{$category_post->category->name}}
          </div>
      @endforeach
      </td>
      <td>
        <a href="{{route('profile.show',$post->user->id)}}" class="text-decoration-none text-dark">
          {{$post->user->name}}
        </a>
      </td>
      <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
      <td class="text-center">
        @if($post->trashed())
          <i class="fa-solid fa-circle text-secondary"></i>
        @else
         <i class="fa-solid fa-circle text-primary"></i>
        @endif
      </td>
        
      <td>
          <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
              <i class="fa-solid fa-ellipsis"></i>
            </button>

          <div class="dropdown-menu">
          @if ($post->trashed())
            <button type="button" class=" btn dropown-item text-success" data-bs-toggle="modal" data-bs-target="#visible-user-{{$post->id}}">
                <i class="fa-regular fa-eye"></i> Visible post ID: {{$post->id}}
             </button>
         @else
             <button type="button" class=" btn dropown-item text-danger" data-bs-toggle="modal"
             data-bs-target="#hidden-user-{{ $post->id }}">
                <i class="fa-regular fa-eye-slash"></i> Hidden post ID: {{ $post->id }}
             </button>
          @endif
       </div>
       
          @include('admin.posts.modal.status')
        </td>
      </tr>
         @endforeach
    </tbody>
</table>
@endsection
          

          
           