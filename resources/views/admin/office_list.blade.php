@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <h2>Office List</h2>
    <!-- Button trigger modal -->
    <a href="{{ route('office.add') }}" class="btn btn-primary float-right mb-3">
        New Office
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Address2</th>
            <th scope="col">Status</th>
            <th scope="col">Parent Office</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $office)
            <tr>
                <td>{{ $office->name }}</td>
                <td>{{ $office->address }}</td>
                <td>{{ $office->address2 }}</td>
                <td>
                    @if($office->status)
                        <a href="javascript:void(0)" class="btn btn-success">Aktif</a>
                    @else
                        <a href="javascript:void(0)" class="btn btn-danger">Pasif</a>
                    @endif
                </td>
                <td>
                    @if($office->parent_office=='0')
                        Main Office
                    @else
                        {{ $office->parentOffice->name }}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('js')

@endsection
