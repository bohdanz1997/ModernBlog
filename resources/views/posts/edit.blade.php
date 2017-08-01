@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Edit Post</div>
    <div class="panel-body">
        <a href="{{ route('posts.index') }}" title="Back">
            <button class="btn btn-warning">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
        <br />
        <br />
        <form action="{{ route('posts.update', $post) }}"
            method="POST"
            enctype="multipart/form-data" class="form-horizontal">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
            @include ('posts.form')
        </form>

    </div>
</div>

@endsection
