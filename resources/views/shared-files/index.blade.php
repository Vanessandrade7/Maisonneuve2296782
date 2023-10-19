@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('shared-files.create') }}" class="btn btn-primary mb-3">{{ __('messages.upload_new_file') }}</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.uploaded_by') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>
                            <a href="{{ route('shared-files.show', $file->id) }}">
                                {{ app()->getLocale() == 'en' ? $file->title_en : $file->title_fr }}
                            </a>
                        </td>
                        <td>{{ $file->user->name }}</td>
                        <td>
                            @if (auth()->id() == $file->user_id)
                                <!-- Edit and Delete Buttons -->
                                <a href="{{ route('shared-files.edit', $file->id) }}"
                                    class="btn btn-warning">{{ __('messages.edit') }}</a>
                                <form action="{{ route('shared-files.destroy', $file->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $files->links() }}
    </div>
@endsection
