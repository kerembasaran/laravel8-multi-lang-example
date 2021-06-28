@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <h2>Diller</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#exampleModal">
        Add New Language
    </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Language Name</th>
            <th scope="col">Short Name</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages as $language)
            <tr>
                <th scope="row">{{ $language->id }}</th>
                <td>{{ $language->name }}</td>
                <td>{{ $language->short_name }}</td>
                <td>
                    @if($language->status)
                        <a href="" class="btn btn-success">Active</a>
                    @else
                        <a href="" class="btn btn-danger">Passive</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('language.add') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Language Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="short_name" placeholder="Short Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status"> Status
                                <input type="checkbox" name="status">
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
