@extends('layouts.app')

@section('title','Cosfajnego')

@section('content')
<a href="{{ route('files.create') }}" class="btn btn-success">Dodaj plik</a><br/><br/>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>File name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
@foreach($files as $file)
    <tr>
        <td>{{$file->id}}</td>
        <td>
            <img width="200" src="/storage/thumbs/thumb_{{$file->file_name}}" alt="{{$file->file_name}}"/></td>
        <td>
            <a class="btn btn-primary" href="{{ route('files.edit', $file->id) }}">Edit</a>
        </td>
        <td>
            <form method="POST" action="{{ route('files.destroy', $file->id) }}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>
    {{$files->links()}}
@endsection