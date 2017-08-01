<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">Name</label>
    <div class="col-md-6">
        <input value="{{ isset($post) ? $post->name : '' }}"
            name="name" type="text" class="form-control" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="col-md-4 control-label">Content</label>
    <div class="col-md-6">
        <textarea rows="10" name="content" type="text" class="form-control" required>
{{ isset($post) ? $post->content : '' }}
        </textarea>
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">Category</label>
    <div class="col-md-6">
        <select
            name="category_id" type="select" class="form-control" required>
            @foreach ($categories as $key => $value)
                <option {{ $selectedCategory == $key ? 'selected="selected"' : '' }}
                    value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    <label for="file" class="col-md-4 control-label">Image</label>
    <div class="col-md-6">
        <input type="file" name="file" class="form-control" required>
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input type="submit" class="btn btn-primary" value="Save">
    </div>
</div>
