@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <h2>Language Group</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#exampleModal">
        Add New Language Group
    </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languageGroups as $languageGroup)
            <tr>
                <td>
                    <a href="{{ route('language.groupDetail',$languageGroup->id) }}">{{ $languageGroup->name }}</a>
                </td>
                <td>{{ $languageGroup->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Language Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('language.groups.add') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Group Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" placeholder="Description" class="form-control">
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
