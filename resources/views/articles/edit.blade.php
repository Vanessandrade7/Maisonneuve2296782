@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Article</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title_en" class="form-label">Title (English)</label>
                <input type="text" name="title_en" class="form-control" value="{{ $article->title_en }}" required>
            </div>
            <div class="mb-3">
                <label for="title_fr" class="form-label">Title (French)</label>
                <input type="text" name="title_fr" class="form-control" value="{{ $article->title_fr }}" required>
            </div>
            <div class="mb-3">
                <label for="content_en" class="form-label">Content (English)</label>
                <textarea name="content_en" class="form-control" rows="5" required>{{ $article->content_en }}</textarea>
            </div>
            <div class="mb-3">
                <label for="content_fr" class="form-label">Content (French)</label>
                <textarea name="content_fr" class="form-control" rows="5" required>{{ $article->content_fr }}</textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="{{ $article->date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection
