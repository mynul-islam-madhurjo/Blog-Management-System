@extends('admin.template.admin_master')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>Genre</h1>
            </div>
            <div class="col-12 col-md-2">
                <a href="{{ route('admin.genre.create') }}" class="btn btn-lg btn-block btn-primary">New Genre</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th class="large-col">Genre</th>
                    <th class="large-col">Status</th>
                    <th> Action </th>
                    </thead>
                    <tbody>
                    @php($i = 1)
                        @foreach($genres as $genre)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $genre->catagory }}</td>
                                <td>
                                    @if($genre->status!=Null)
                                     @if($genre->status==1){{'Active'}}@else{{'Inactive'}}@endif
                                    @else
                                    <div class="span" style="color: red">{{'No Data Found'}}</div>
                                    @endif
                                </td>
                                <td>
{{--                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm btn-btmargin form-control">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm btn-btmargin form-control">Edit</a>--}}
                                    <a href="{{url('/admin/genres/edit/'.$genre->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12">
                                    {!! $genres->links(); !!}
                </div>
            </div>
        </div>
    </div>

@stop
