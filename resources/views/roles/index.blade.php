@extends('layouts.app')

@section('title','Cosfajnego')

@section('content')
<a href="{{ route('roles.create') }}" class="btn btn-success">Dodaj</a><br/><br/>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
@foreach($roles as $role)
    <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
        </td>
        <td>
            <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>
    {{$roles->links()}}
@endsection