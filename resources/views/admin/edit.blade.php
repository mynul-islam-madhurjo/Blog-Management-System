@extends('layouts.app')

@section('stylesheets')

    <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <h1>Edit Blog</h1>
            <hr>
            <form action="{{url('/admin/blogs/update/'.$blogs->id)}}" method="post" data-parsley-validate>
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" value="{{$blogs->title}}" maxlength="255" required>
                </div>

                <div class="form-group my-4">
                    <label for="body">Select Genre</label>
                    <select class="custom-select" name="blog_genre_id">
                        <option disabled selected value> -- Select a Genre -- </option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id}}" {{$genre->id == $blogs->blog_genre_id  ? 'selected' : ''}}>{{ $genre->catagory }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="body">Post Body</label>
                    <textarea class="form-control" name="description" value="" rows=10 required>{{$blogs->description}}</textarea>
                </div>

                <div class="form-group">
                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{in_array($tag->id, collect($blogs->tags)->pluck('id')->toArray())  ? 'selected' : ''}}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="">Select a status</option>
                        @foreach($statuses as $index => $status)
                            <option value="{{ $index }}" {{$blogs->status == $index  ? 'selected' : ''}}>
                                {{$status}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Images</label>
                    <input class="form-control" type="file" name="image-blog" value="{{$blogs->blog_image}}" required>
                </div>

                <div class="form-group">
                    <img src="{{asset($blogs->blog_image)}}" style="height: 120px; width: 90px;">
                </div>




                <button type="submit" name='submit' class="btn btn-success form-control my-4" >Update Blog</button>
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
