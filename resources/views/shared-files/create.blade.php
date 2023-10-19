@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('shared-files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title_en" class="form-label">Title (EN)</label>
                <input type="text" class="form-control" id="title_en" name="title_en" required>
            </div>
            <div class="mb-3">
                <label for="title_fr" class="form-label">Title (FR)</label>
                <input type="text" class="form-control" id="title_fr" name="title_fr" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="file" name="file" accept=".pdf,.zip,.doc,.docx"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
