@extends('layouts.master')
@section('content')
    <div class="container my-conainter-width">
        {!! Form::model($data, ['url' => '/link/'. $data->id, 'method' => 'PUT']) !!}

        <div class="form-group mt-5">
            {!! Form::label('name', 'Name', ['class' => 'form-label m-1']) !!}
            {!! Form::text('name', $data->name, ['class' => 'form-control m-1', 'id' => 'name', 'disabled'=>'false']) !!}
        </div>

        <div class="form-group mt-5">
            {!! Form::label('link', 'Link', ['class' => 'form-label m-1']) !!}
            {!! Form::text('link', $data->link, ['class' => 'form-control m-1', 'id' => 'link']) !!}
        </div>

        <div class="form-group mt-5 center">
            {!! Form::submit("Submit", ["class"=>"btn-sm btn-primary"]) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
