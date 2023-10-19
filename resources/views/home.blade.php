@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @guest
                            {{ __('messages.you_are_not_logged_in') }}
                        @else
                            {{ __('messages.you_are_logged_in') }}
                            @endif
                            @auth
                                <div class="mt-3">
                                    <h5>{{ __('messages.articles') }}:</h5>
                                    @forelse($articles as $article)
                                        <div class="article-item">
                                            <h3>
                                                <a href="{{ route('articles.show', $article->id) }}">
                                                    {{ $article['title_' . App::getLocale()] }}
                                                </a>
                                            </h3>
                                            <p>{{ Str::limit($article['content_' . App::getLocale()], 150) }}</p>
                                            <p><small>Published on {{ $article->created_at->format('M d, Y') }}</small></p>
                                        </div>
                                    @empty
                                        <p>No articles available.</p>
                                    @endforelse


                                    <div class="mt-2">
                                        <a href="{{ route('shared-files.index') }}">
                                            {{ __('messages.shared_files') }}
                                        </a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
