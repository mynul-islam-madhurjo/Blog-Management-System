@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <h1>Edit Genre</h1>
        <hr>
        <form action="{{url('/admin/genres/update/'.$genres->id)}}" method="post" data-parsley-validate>
            @csrf
            <div class="form-group">
                <label for="title">Edit Genre</label>
                <input class="form-control" type="text" name="catagory" value="{{$genres->catagory}}" maxlength="25" required>
{{--                @if($errors->has('catagory'))<span class="required text-danger" >{{ $errors->first('catagory') }}</span>@endif--}}
                @error('catagory')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="">Select a status</option>
                        @foreach($statuses as $index => $status)
                            <option value="{{ $index }}" {{$genres->status == $index  ? 'selected' : ''}}>
                                {{$status}}
                            </option>
                        @endforeach
                    </select>
            </div>

            <div class="div" style="padding-top: 10px">
                <button type="submit" name='submit' class="btn btn-success form-control">Update Genre</button>
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
