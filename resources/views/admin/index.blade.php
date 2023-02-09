@extends('admin.template.admin_master')

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
                    <th>Images</th>
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
{{--                                    {{ substr($blog->description, 0, 50) }}--}}
                                    {{ strlen($blog->description) > 50 ? substr($blog->description, 0, 50). '...': $blog->description }}
                                </td>
                                <td><img src="{{ asset($blog->blog_image) }}" style="height: 60px; width: 90px;"></td>
                                <td>{{ date('M j, Y g:i', strtotime($blog->created_at)) }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>
                                    {{--<a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm btn-btmargin form-control">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm btn-btmargin form-control">Edit</a>--}}
                                    <a href="{{url('/admin/blogs/show/'.$blog->id)}}" class="btn btn-info">View</a>
                                    <a href="{{url('/admin/blogs/edit/'.$blog->id)}}" class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal.{{$blog->id}}">
                                        View Tag
                                    </button>
                                    <a href="{{ url('/admin/blogs/delete/'.$blog->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- Start Modal -->
                            <div class="modal fade" id="exampleModal.{{$blog->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                @foreach($blog->tags as $tag)
                                                    <li class="list-group-item">{{$tag->name}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--    End Modal--}}
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
