@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <form action="{{ route('language.phraseAdd') }}" method="POST" class="mt-3">
        @csrf
        <div class="form-group">
            <select name="language_group" id="language_group" class="form-control">
                @foreach($languageGroups as $languageGroup)
                    <option value="{{ $languageGroup->id }}">{{ $languageGroup->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="phrase" class="form-control" placeholder="Phrase (Key)">
        </div>
        <div class="form-group">
            <input type="text" name="phrase_value" class="form-control" placeholder="Phrase Value">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Add</button>
        </div>
    </form>
@endsection
@section('js')

@endsection
