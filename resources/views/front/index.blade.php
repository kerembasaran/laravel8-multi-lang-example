@extends('layouts.app')

@section('title')
    Home
@endsection
@section('css')

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            {{-- {{ dd(request()->all()) }} --}}
            {{ $language['general.title'] }}
            {{ request()->languageID }}
            {{ request()->currentLang }}
        </div>
        <div class="card-footer">
            Card footer
        </div>
    </div>
@endsection
@section('js')

@endsection
