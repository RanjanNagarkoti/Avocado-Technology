@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h4 class="m-5">Video Details</h4>
                <div class="form-group m-5">
                    <input type="text" value="{{ $data->name }}" class="form-control" disabled>
                </div>
                <div class="form-group m-5">
                    <textarea name="desc" id="desc" rows="10" class="form-control" disabled>{{ $data->desc }}</textarea>
                </div>
                <div class="form-group m-5">
                    <select name="active" id="active" class="form-control" disabled>
                        <option value="{{ $data->Active }}">{{ ucfirst($data->Active) }}</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="my-row mt-5">
                    <h6>Add Links</h6>
                    <button class="btn-sm btn-primary" onclick="newBox()">New box</button>
                </div>
                {!! Form::open(['url' => '/video/' . $data->id . '/link', 'method' => 'post']) !!}

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control mb-5" id="name" name="name" value="{{ $data->name }}">

                    <label class="form-label">Links</label>

                    <div id="newList">
                        <input type="text" class="form-control mb-5" id="link0" name="link0">
                    </div>
                    {!! Form::submit('Submit', ['class' => 'btn-sm btn-primary']) !!}
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        function newBox() {
            let parent = document.getElementById('newList');
            let childrens = parent.children;
            let id = childrens.length;
            let tag = '<input type="text" class="form-control mb-5" id="link' + id + '" name="link' + id + '">'
            parent.innerHTML += tag;
        }
    </script>
@endsection
