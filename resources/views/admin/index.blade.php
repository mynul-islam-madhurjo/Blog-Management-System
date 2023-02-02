@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>All Blogs</h1>
            </div>
            <div class="col-12 col-md-2">
                <a href="{{ route('admin.create') }}" class="btn btn-lg btn-block btn-primary">New Blog</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th class="large-col">Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Author</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @php($i = 1)
                        @foreach($blogs as $blog)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    {{ substr($blog->description, 0, 50) }}
                                    {{ strlen($blog->description) > 50 ? '...':'' }}
                                </td>
                                <td>{{ date('M j, Y g:i', strtotime($blog->created_at)) }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>
                                    {{--<a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm btn-btmargin form-control">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm btn-btmargin form-control">Edit</a>--}}
                                    <a href="" class="btn btn-success">View</a>
                                    <a href="{{url('/admin/blogs/edit/'.$blog->id)}}" class="btn btn-info">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 paginationCustom" style="overflow:hidden;">
                {{$blogs->appends(Request::except('page'))->links() }}
            </div>

        </div>
    </div>

@stop
