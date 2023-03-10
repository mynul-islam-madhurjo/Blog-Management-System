@extends('admin.template.admin_master')

@section('stylesheets')

    <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

@endsection


@section('content')

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h1>Create New Blog</h1>
        <hr>
        <form action="{{ route('admin.store') }}" method="post" data-parsley-validate enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" maxlength="255" required>
            </div>

            <div class="form-group my-4">
                <label for="body">Select Genre</label>
                <select class="custom-select" name="blog_genre_id">
                    <option disabled selected value> -- Select a Genre -- </option>
                    @foreach($genreLists as $genreList)
                        <option value="{{ $genreList->id }}">{{ $genreList->catagory }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="body">Blog Description</label>
                <textarea class="form-control" name="description" rows=10 required></textarea>
            </div>

            <div class="form-group my-4">
                <label for="body">Blog Image</label>
                <input class="form-control" type="file" name="blog_image">
            </div>

            <div class="form-group">
                <label for="body">Blog Tags</label>
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tagLists as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group my-4">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="1"> Active</option>
                    <option value="0"> Inactive</option>
                </select>
            </div>


            <button type="submit" name='submit' class="btn btn-success form-control my-4" >Create Post</button>
        </form>
    </div>
</div>

@stop

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <!-- script to make select2 form element function -->
    <script>
        $('.select2-multi').select2({
            placeholder: "Select Tags"
        });
    </script>

@stop
