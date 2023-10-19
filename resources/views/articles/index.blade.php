@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h1>Articles</h1>
            <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">{{ __('messages.add_article') }}</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>
                            <a href="{{ route('articles.show', $article->id) }}">
                                {{ App::getLocale() == 'en' ? $article->title_en : $article->title_fr }}
                            </a>
                        </td>
                        <td>{{ $article->created_at->format('Y-m-d') }}</td>
                        <td>
                            @if (auth()->id() == $article->user_id)
                                <a href="{{ route('articles.edit', $article->id) }}"
                                    class="btn btn-sm btn-warning">{{ __('messages.edit') }}</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
