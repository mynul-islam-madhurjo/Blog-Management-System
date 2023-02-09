@extends('admin.template.admin_master')

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
                    </thead>
                    <tbody>
                    @php($i = 1)
                        @foreach($tags as $tag)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $tag->name }}</td>
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
