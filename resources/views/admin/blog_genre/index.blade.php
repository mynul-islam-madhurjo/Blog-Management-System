@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>Category</h1>
            </div>
            <div class="col-12 col-md-2">
                <a href="{{ route('admin.genre.create') }}" class="btn btn-lg btn-block btn-primary">New Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th class="large-col">Category</th>
                    <th class="large-col">Status</th>
                    <th></th>
                    </thead>
                    <tbody>
                        @foreach($genres as $genre)

                            <tr>
                                <td>{{ $genre->id }}</td>
                                <td>{{ $genre->catagory }}</td>
                                <td>@if($genre->status==1){{'Active'}}@else{{'Inactive'}}@endif </td>
                                <td>
{{--                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm btn-btmargin form-control">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm btn-btmargin form-control">Edit</a>--}}
                                    <a href="" class="btn btn-success btn-sm btn-btmargin form-control">View</a>
                                    <a href="" class="btn btn-info btn-sm btn-btmargin form-control">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12">
                    {{--                {!! $posts->links(); !!}--}}
                </div>
            </div>
        </div>
    </div>

@stop
