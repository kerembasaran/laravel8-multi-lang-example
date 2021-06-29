@extends('admin.layouts.app')

@section('title')
    Admin
@endsection
@section('css')

@endsection
@section('content')
    <h2>Language Phrase List</h2>
    <!-- Button trigger modal -->
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Key</th>
            @foreach($languages as $language)
                <th scope="col">{{ $language->name }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($phraseList as $phrase)
            <tr>
                <td>{{ $phrase->key }}</td>

                @foreach($phrase->translate as $translate)
                    <td>
                        <a class="changeText" data-toggle="modal" data-target="#exampleModal" data-id="{{ $translate->id }}" data-content="{!! $translate->value !!}">
                            <?php
                            $content = strip_tags($translate->value);
                            if (strlen($content) < 1) {
                                $content = 'Show Content';
                            }
                            ?>
                            {{ substr($content,0,25) }}
                        </a>
                    </td>
                @endforeach

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
                <form action="{{ route('language.groupDetailUpdate') }}" method="POST" id="phraseUpdate">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="translateID" id="translateID" value="">
                        <div class="form-group">
                            <textarea name="phrase" id="editor" cols="30" rows="10"></textarea>
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
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            $(function ($) {
                CKEDITOR.replace('editor');
            });

            $('.changeText').click(function () {
                let dataID = $(this).data('id');
                $('#translateID').val(dataID);
                $.ajax({
                    url: "{{ route('language.groupDetail.getText') }}",
                    method: 'POST',
                    async: false,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        dataID: dataID
                    },
                    success: function (response) {
                        CKEDITOR.instances['editor'].setData(response.content);
                    }
                });
            });
        });
    </script>
@endsection
