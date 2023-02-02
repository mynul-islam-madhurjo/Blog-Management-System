@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>Users</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th class="large-col">Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    </thead>
                    <tbody>
                    @php($i = 1)
                        @foreach($users as $user)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->created_at->diffForHumans() }}
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
