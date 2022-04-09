@extends('layouts.master')
@section('content')
    <div class="my-row">
        <h5>Video Lists</h5>
        <a href="{{ route('video.create') }}" class="btn-sm btn-primary my-btn">Add Video</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Active</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sn = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $sn++ }}</th>
                        <td class="col-2">
                            {{ $item->name }}
                        </td>
                        <td class="col-6">
                            @if (strlen($item->desc) > 100)
                                {{ str_limit($item->desc) }}
                            @else
                                {{ $item->desc }}
                            @endif
                        </td>
                        <td>
                            {{ ucfirst($item->Active) }}
                        </td>
                        <td>
                            <a href="{{ url('/video/' . $item->id . '/link') }}"
                                class="btn-sm btn-primary my-btn">Links</a>
                        </td>
                        <td class="d-flex">
                            <a href="/video/{{ $item->id }}/edit" class="btn-sm btn-primary my-btn m-1">Edit</a>


                            {!! Form::open(['url' => '/video/' . $item->id, 'method' => 'DELETE', 'class' => 'delete_video']) !!}
                            <button class="btn-sm btn-danger m-1" type="submit">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
