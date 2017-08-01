@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Posts</div>
    <div class="panel-body">
        <a href="{{ route('posts.create') }}" class="btn btn-success" title="Add New">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ str_limit($item->content, 80) }}</td>
                            <td>
                                <a href="{{ route('posts.show', $item) }}" title="View Post">
                                    <button class="btn btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        View
                                    </button>
                                </a>
                                <a href="{{ route('posts.edit', $item) }}" title="Edit Post">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        Edit
                                    </button>
                                </a>
                                <form
                                    action="{{ route('posts.destroy', $item) }}"
                                    style="display:inline"
                                    method="POST"
                                    enctype="multipart/form-data" class="form-horizontal">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" title="Delete Post" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</div>

@endsection
