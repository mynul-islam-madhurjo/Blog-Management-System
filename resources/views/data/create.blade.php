@extends('admin.template.admin_master')


@section('content')

    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <h1>Upload Data</h1>
            <hr>
            <form action="{{ route('admin.data.store') }}"  method="post" data-parsley-validate enctype="multipart/form-data">
                @csrf
                <div class="form-group my-4">
                    <label for="body">Source Data</label>
                    <input class="form-control" type="file" name="mycsv">
                </div>

                <button type="submit" name='submit' class="btn btn-success form-control my-4" >Submit</button>
            </form>
        </div>
    </div>

@stop

