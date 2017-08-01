@extends('layouts.admin')

@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Create New Nation</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/nations') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::open([
                            'url' => '/admin/nations',
                            'enctype' => 'multipart/form-data',
                            'class' => 'form-horizontal',
                            'files' => true]) !!}

                        @include ('admin.nations.form')

                        {!! Form::close() !!}

                    </div>
                </div>

@endsection
