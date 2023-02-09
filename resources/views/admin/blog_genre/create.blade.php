@extends('admin.template.admin_master')

@section('content')

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h1>Create New Genre</h1>
        <hr>
        <form action="{{ route('admin.genre.store') }}" method="post" data-parsley-validate>
            @csrf

            <div class="form-group">
                <label for="title">Genre</label>
                <input class="form-control" type="text" name="catagory" maxlength="25" required>
{{--                @if($errors->has('catagory'))<span class="required text-danger" >{{ $errors->first('catagory') }}</span>@endif--}}
                @error('catagory')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="1"> Active</option>
                    <option value="0"> Inactive</option>
                </select>
            </div>

            <div class="div" style="padding-top: 10px">
                <button type="submit" name='submit' class="btn btn-success form-control">Create Genre</button>
            </div>

        </form>
    </div>
</div>

@stop

{{--
@section('scripts')

    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <!-- script to make select2 form element function -->
    <script>
        $('.select2-multi').select2({
            placeholder: "Select Tags"
        });
    </script>

@stop--}}
