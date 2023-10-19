@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Article</h1>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title_en" class="form-label">Title (English)</label>
                <input type="text" name="title_en" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="title_fr" class="form-label">Title (French)</label>
                <input type="text" name="title_fr" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="content_en" class="form-label">Content (English)</label>
                <textarea name="content_en" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="content_fr" class="form-label">Content (French)</label>
                <textarea name="content_fr" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Article</button>
        </form>
    </div>
@endsection
