@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Display article title based on the user's current language -->
                    <div class="card-header">{{ $article['title_' . App::getLocale()] }}</div>

                    <div class="card-body">
                        <!-- Display article content based on the user's current language -->
                        <p>{{ $article['content_' . App::getLocale()] }}</p>
                        <hr>
                        <p><small>{{ __('Published on') }} {{ $article->created_at->format('M d, Y') }}</small></p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary">{{ __('Back to articles') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
