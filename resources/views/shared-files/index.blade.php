@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('shared-files.create') }}" class="btn btn-primary mb-3">Upload New File</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title (EN)</th>
                    <th>Title (FR)</th>
                    <th>Uploaded By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file->title_en }}</td>
                        <td>{{ $file->title_fr }}</td>
                        <td>{{ $file->user->name }}</td>
                        <td>
                            <a href="{{ route('shared-files.edit', $file->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('shared-files.destroy', $file->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $files->links() }} {{-- Pagination links --}}
    </div>
@endsection
