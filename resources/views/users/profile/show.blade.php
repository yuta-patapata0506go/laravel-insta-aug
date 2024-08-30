@extends('layouts.app')

@section('title')

@section('content')
  @include('users.profile.header')

  <div class="mt-5">
    @if($user->posts->isNotEmpty())
        <div class="row">
           @foreach($user->posts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
              <a href="{{route('post.show',$post->id)}}">
                <img src="{{$post->image}}" alt="Post ID {{$post->id}}" class="img-thumbnail">
              </a>
            </div>
            @endforeach
        </div>
        @else
          <h3 class="text-muled text-center">No Posts yet</h3>
        @endif
        

        </div>
  
@endsection

