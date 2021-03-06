@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Edit Category</div>
    <div class="panel-body">
        <a href="{{ route('categories.index') }}" title="Back">
            <button class="btn btn-warning">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
        <br />
        <br />
        <form action="{{ route('categories.update', $category) }}"
            method="POST"
            enctype="multipart/form-data" class="form-horizontal">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
            @include ('categories.form')
        </form>

    </div>
</div>

@endsection
