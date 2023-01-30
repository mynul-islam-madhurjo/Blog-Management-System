@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h1>Create New Catagory</h1>
        <hr>
        <form action="{{ route('admin.genre.create') }}" method="post" data-parsley-validate>
            <div class="form-group">
                <label for="title">Catagory</label>
                <input class="form-control" type="text" name="title" maxlength="20" required>
            </div>

            <div class="form-group">
                <label for="slug">Status</label>
                <div class="option">
                    .
                </div>

                <input class="form-control" type="text" name="slug" minlength="5" required>
            </div>

            <button type="submit" name='submit' class="btn btn-success form-control">Create Post</button>
        </form>
    </div>
</div>

@stop

{{--
@section('scripts')

    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <!-- script to make select2 form element function -->
    <script>
        $('.select2-multi').select2({
            placeholder: "Select Tags"
        });
    </script>

@stop--}}
