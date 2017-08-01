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


<div class="panel panel-default">
    <div class="panel-heading">Comments</div>
    <div class="panel-body">
        <ul class="list-group" id="comments-container">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->author }}</strong>:
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>
        <div class="col-md-6">
            <h4>Leave a comment</h4>
            <br>
            <div class="alert alert-danger no-display">
              <ul class="errors"></ul>
            </div>
            <div class="form-group">
                <label for="author" class="form-label">Author (ex. "Firstname Lastname")</label>
                <input class="form-control" type="text" id="author" name="author" required="required">
            </div>
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="8" cols="80" required="required"></textarea>
            </div>
            <input type="hidden" id="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <button class="btn btn-primary" type="buttom" id="publish-comment">Publish</button>
            </div>
        </div>
    </div>
</div>

@endsection
