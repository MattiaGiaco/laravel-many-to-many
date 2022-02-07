@extends('layouts.app')

@section('content')
<div class="container">

  @if (session('deleted'))
    <div class="alert alert-danger" role="alert">
      {{session('deleted')}}
    </div>
  @endif
  
    <div class="row justify-content-center">
        <h1>Elenco posts</h1>
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Azioni</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                @if ($post->category)
                  <td>{{ $post->category->name }}</td>
                @else
                  <td>-</td>
                @endif               
                <td><a href="{{ route('admin.post.show', $post) }}" class="btn btn-info">SHOW</a></td>
                <td><a href="{{ route('admin.post.edit', $post) }}" class="btn btn-success">EDIT</a></td>
                <td>
                  <form onsubmit="return confirm('Vuoi eliminare {{$post->title}}?')" action="{{route('admin.post.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETE</button>
                  </form>
                </td>
              </tr>
             @endforeach
          </tbody>
        </table>
        {{$posts->links()}}
    </div>

    @foreach ($categories as $category)
      <h2>{{ $category->name }}</h2>
        <ul>
          @foreach ($category->posts as $post_category)
        
            <li><a href="{{ route('admin.post.show', $post_category) }}">{{ $post_category->title }}</a></li>
        
          @endforeach
        </ul>
    @endforeach
    
    
</div>
@endsection

@section('title')
    | Elenco post
@endsection