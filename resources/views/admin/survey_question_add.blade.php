@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <form action="{{ route('survey.question.add') }}" method="POST" class="mt-3">
        @csrf
        <h2>New Survey Question</h2>

        <div class="form-group">
            <label for="first_question"> Question is first?
                <input type="checkbox" name="first_question" id="first_question">
            </label>
        </div>
        <div class="form-group">
            <select name="occupation" class="form-control">
                @foreach($occupations as $occupation)
                    <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="office" class="form-control">
                <option value="-1">All Office</option>
                @foreach($offices as $office)
                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="question" class="form-control" placeholder="Question">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Add</button>
        </div>
    </form>
@endsection
@section('js')

@endsection
