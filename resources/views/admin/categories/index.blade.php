@extends('layouts.app')

@section('title','Admin:index')

@section('content')
  <table class="table table-hover  align-middle">
    <thead class="table-sm table-warning">
          <tr>
            <td>#</td>
            <td>NAME</td> 
            <td>COUUNT</td>
            <td>LAST UPDATED</td>
            <td></td>
            <td></td>
          </tr>
      </thead>
       
  <tbody>
       @foreach ($all_categories as $category)
    <tr>
        <td>
          {{$category->id}}
        </td>
        <td>
        {{$category->name}}
       </td>
       <td>
       {{$category->count()}}
      
       </td>
       <td>
       
      </td>
      @endforeach  
      <td>
        <button class="btn btn-outline-warning"><i class="fa-solid fa-pen"></i></button>
      </form>
      </td>
      <td>
      <form action="{{route('admin.categories.destroy',$category->id)}}">
      @csrf
      @method('DELETE')
      <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
      </form>
      </td>
       
          @include('admin.categories.modal.status')
        </td>
      </tr>
        
    </tbody>
</table>
@endsection