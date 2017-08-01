@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Categories</div>
    <div class="panel-body">
        <a href="{{ route('categories.create') }}" class="btn btn-success" title="Add New">
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
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ str_limit($item->description, 50) }}</td>
                            <td>
                                <a href="{{ route('categories.show', $item) }}" title="View Category">
                                    <button class="btn btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        View
                                    </button>
                                </a>
                                <a href="{{ route('categories.edit', $item) }}" title="Edit Category">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        Edit
                                    </button>
                                </a>
                                <form
                                    action="{{ route('categories.destroy', $item) }}"
                                    style="display:inline"
                                    method="POST"
                                    enctype="multipart/form-data" class="form-horizontal">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" title="Delete Category" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $categories->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>

    </div>
</div>

@endsection
