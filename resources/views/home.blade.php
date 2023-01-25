@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>


                                @foreach($users as $user)
                                    {{dd($user)}}
                                    <tr>
                                        <td></td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
