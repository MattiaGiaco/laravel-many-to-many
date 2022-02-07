@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Modifica: {{ $post->title }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

    <form action="{{ route('admin.post.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" 
            class="form-control @error('title') is-invalid @enderror" 
            value="{{ old('title', $post->title) }}"
            name="title" id="title" placeholder="titolo">
            @error('title')
              <p class="form_errors">
                {{ $message }}
              </p>
            @enderror
            
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control @error('content') is-invalid @enderror" 
            name="content" id="content" placeholder="contenuto">{{ old('content', $post->content) }}</textarea>
            @error('content')
              <p class="form_errors">
                {{ $message }}
              </p>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Invia</button>
    </form>
</div>
@endsection

@section('title')
    | Modifica post
@endsection