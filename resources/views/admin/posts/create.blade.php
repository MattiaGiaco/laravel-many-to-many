@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Inserisci nuovo post</h1>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

    <form action="{{ route('admin.post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" 
            class="form-control @error('title') is-invalid @enderror" 
            value="{{ old('title') }}"
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
            name="content" id="content" placeholder="contenuto">{{ old('content') }}</textarea>
            @error('content')
              <p class="form_errors">
                {{ $message }}
              </p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" aria-label="Default select example">
              <option>Select category</option>
              @foreach ($categories as $category)
                <option 
                  @if ($category->id == old('category_id')) selected @endif 
                  value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
              @endforeach             
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Invia</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</div>
@endsection

@section('title')
    | Nuovo post
@endsection