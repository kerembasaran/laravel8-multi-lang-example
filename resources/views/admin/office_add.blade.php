@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <form action="{{ route('office.add') }}" method="POST" class="mt-3">
        @csrf
        <h2>New Office</h2>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Address">
        </div>
        <div class="form-group">
            <input type="text" name="address2" class="form-control" placeholder="Address 2">
        </div>
        <div class="form-group">
            <select name="parent_office" class="form-control">
                <option value="0">Parent Office</option>
                @foreach($offices as $office)
                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status"> Status
                <input type="checkbox" name="status" id="status">
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Add</button>
        </div>
    </form>
@endsection
@section('js')

@endsection
