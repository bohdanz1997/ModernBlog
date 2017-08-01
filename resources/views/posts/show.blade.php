@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Post {{ $post->name }}</div>
    <div class="panel-body">
        <a href="{{ route('posts.index') }}" title="Back">
            <button class="btn btn-warning">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
        <a href="{{ route('posts.edit', $post) }}" title="Edit Post">
            <button class="btn btn-primary">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Edit
            </button>
        </a>
        <form
            action="{{ route('posts.destroy', $post) }}"
            style="display:inline"
            method="POST"
            enctype="multipart/form-data" class="form-horizontal">
            <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" title="Delete Post" onclick="return confirm('Confirm delete?')">
                <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
            </button>
        </form>
        <br/>
        <br/>
        <img src="{{ $post->getFile() }}" class="img-responsive" alt="">
        <br>
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th> Name </th>
                        <td> {{ $post->name }} </td>
                    </tr>
                    <tr>
                        <th> Category </th>
                        <td> {{ $post->category->name }} </td>
                    </tr>
                    <tr>
                        <th> Created at </th>
                        <td> {{ $post->getDate() }} </td>
                    </tr>
                    <tr>
                        <th> Content </th>
                        <td> {{ $post->content }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
