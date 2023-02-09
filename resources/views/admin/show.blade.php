@extends('admin.template.admin_master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div>
                @if($blog->blog_image!=null)
                <img src="{{ asset($blog->blog_image) }}" class="img-fluid" >
                @else
                {{''}}
                @endif
            </div>
            <h1>{{ $blog->title }}</h1>
            <hr>
            <p class="lead">{{ $blog->description }}</p>

            <div class="tags">
                Tags:
                @foreach($blog->tags as $tag)
                    <span class="text-info">{{ $tag->name }}</span>
                @endforeach
            </div>

        </div>

        <div class="col-12 col-md-4">
            <div class="card border-light text-center">
                <div class="card-header"><strong>Blog Info</strong></div>
                <div class="card-body">

                    <dl class="row end">
                        <dt class="col-4">Created At:</dt>
                        <dd class="col-8">{{ date('M j, Y g:i', strtotime($blog->created_at)) }}</dd>

                        <dt class="col-4">Created By:</dt>
                        <dd class="col-8">{{ $blog->user->name }}</dd>

                        <dt class="col-4">Genre:</dt>
                        <dd class="col-8">{{ $blog->genre != null ? $blog->genre->catagory : "None" }}</dd>

                    </dl>

                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
