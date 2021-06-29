@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <form action="{{ route('occupation.add') }}" method="POST" class="mt-3">
        @csrf
        <h2>New Occupation</h2>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Occupation Name">
        </div>
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Occupation Description">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Add</button>
        </div>
    </form>
@endsection
@section('js')

@endsection
