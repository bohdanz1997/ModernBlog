@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Category {{ $category->name }}</div>
    <div class="panel-body">
        <a href="{{ route('categories.index') }}" title="Back">
            <button class="btn btn-warning">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
        <a href="{{ route('categories.edit', $category) }}" title="Edit Category">
            <button class="btn btn-primary">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Edit
            </button>
        </a>
        <form
            action="{{ route('categories.destroy', $category) }}"
            style="display:inline"
            method="POST"
            enctype="multipart/form-data" class="form-horizontal">
            <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" title="Delete Category" onclick="return confirm('Confirm delete?')">
                <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
            </button>
        </form>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <th> Name </th>
                        <td> {{ $category->name }} </td>
                    </tr>
                    <tr>
                        <th> Description </th>
                        <td> {{ $category->description }} </td>
                    </tr>
                    <tr>
                        <th> Posts </th>
                        <td>
                            <ul class="list-group">
                                @foreach ($category->getPostsAsArray() as $key => $value)
                                    <li><a href="{{ route('posts.show', $key) }}">{{ $value }}</a></li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
