@extends('layouts.master')
@section('content')
    <div class="my-container mt-5 mb-5">
        {!! Form::model($data, ['url' => '/video/' . $data->id, 'method' => 'put']) !!}
        <div class="form-group mt-3">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', $data->name, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mt-3">
            {!! Form::label('desc', 'Descrption', ['class' => 'form-label']) !!}
            {!! Form::textarea('desc', $data->desc, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group mt-3">
            {!! Form::label('active', 'Active', ['class' => 'form-label']) !!}
            {!! Form::select('active', ['No' => 'No', 'Yes' => 'Yes'], $data->active, ['class' => 'form-control']) !!}
        </div>
        <div class="center mt-3">
            {!! Form::submit('Update', ['class' => 'btn-sm btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
