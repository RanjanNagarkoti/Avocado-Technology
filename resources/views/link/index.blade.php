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
                    <h6>Video Links</h6>
                    <a href="{{ url('/video/' . $data->id . '/link/create') }}" class="btn-sm btn-primary my-btn">Add
                        Link</a>
                </div>
                <table class="table">
                    <thead>
                        <th class="col-8">Links</th>
                        <th class="col-4">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($links as $item)
                            <tr>

                                <td>
                                    <a href="{{ $item->link }}" target="_blank">{{ $item->name }}</a>
                                    {!! Form::open(['url' => '/link/' . $item->id, 'method' => 'DELETE', 'id' => 'submit_me']) !!}
                                    {!! Form::close() !!}
                                </td>

                                <td class="d-flex">
                                    <a href="{{ url('/link/' . $item->id) . '/edit' }}"
                                        class="btn-sm btn-primary my-btn m-1">Edit</a>
                                    <button type="button" class="btn-sm btn-danger m-1" onclick="deleteData()">
                                        Delete
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteData() {
            let result = confirm("Are you sure?")
            if (result == true) {
                document.getElementById('submit_me').submit()
            } else {
                console.log("cancel")
            }
        }
    </script>
@endsection
