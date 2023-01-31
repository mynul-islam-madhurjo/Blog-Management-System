@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>Tags</h1>
            </div>
            <div class="col-12 col-md-2">
                <a href="{{ route('admin.tag.create') }}"  class="btn btn-lg btn-block btn-primary">New Tag</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th class="large-col">Tags</th>
                    <th></th>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)

                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
{{--                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm btn-btmargin form-control">View</a>
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
