@extends('layouts.admin')

@section('content')

                <div class="panel panel-default">
                    <div class="panel-heading">Edit Nation #{{ $nation->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/nations') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::model($nation, [
                            'method' => 'PATCH',
                            'url' => ['/admin/nations', $nation->id],
                            'enctype' => 'multipart/form-data',
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.nations.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>

@endsection
