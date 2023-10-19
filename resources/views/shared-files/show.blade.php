@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('sharedfile.file_details') }}</div>

                    <div class="card-body">
                        <h4>{{ $file['title_'.App::getLocale()] }}</h4>
                        <hr>
                        <!-- Download Link -->
                        <a href="{{ route('shared-files.download', $file->id) }}"
                            class="btn btn-primary">{{ __('sharedfile.download_file') }}</a>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('shared-files.index') }}"
                        class="btn btn-secondary">{{ __('sharedfile.back_to_shared_files') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
