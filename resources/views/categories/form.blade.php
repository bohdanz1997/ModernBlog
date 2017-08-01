<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">Name</label>
    <div class="col-md-6">
        <input value="{{ isset($category) ? $category->name : '' }}"
            name="name" type="text" class="form-control" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">Description</label>
    <div class="col-md-6">
        <input value="{{ isset($category) ? $category->description : '' }}"
            name="description" type="text" class="form-control" required>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input type="submit" class="btn btn-primary" value="Save">
    </div>
</div>
