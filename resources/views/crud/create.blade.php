@extends('layouts.master')
@section('content')
    <div class="my-row">
        <h5>Add Video</h5>
        <a href="{{ route('video.index') }}" class="btn-sm btn-primary my-btn">Go back</a>
    </div>
    {{ Form::open(['url' => '/video', 'method' => 'post', 'class' => 'my-form']) }}
    <div class="my-container">
        <div class="row mt-3 mb-3">

            <div class="col-12">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!} <small class="warning">*</small>
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required'=>'true']) !!}
            </div>

        </div>
        <hr>
        <div class="row">

            <div class="col-12 mt-3 mb-3">
                {!! Form::label('desc', 'Description', ['class' => 'form-label']) !!} <small class="warning">Limit (2000w)</small>
                {!! Form::textarea('desc', null, ['row' => 10, 'class' => 'form-control', 'id' => 'desc', 'onkeydown' => 'wordCount()', 'required'=>'true']) !!}
                <span>Total words: <span id="count_show"></span> </span>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-12 mt-3 mb-3">
                {!! Form::label('active', 'Active', ['class' => 'form-label']) !!}
                {!! Form::select('active', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control', 'id' => 'active']) !!}
            </div>

        </div>

        <div class="center">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'submit_button']) !!}
        </div>
    </div>


    {{ Form::close() }}
    <script>
        function wordCount() {
            let words = document.getElementById('desc').value;
            document.getElementById('count_show').innerHTML = words.length;
            let btn = document.getElementById("submit_button");
            if (words.length > 2000) {
                btn.disabled = true;
            }
            else{
                btn.disabled = false;
            }
        }
    </script>
@endsection
