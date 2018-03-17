@extends('layouts.app')

@section('title','Cosfajnego')

@section('content')
<a href="{{ route('categories.create') }}" class="btn btn-success">Dodaj</a><br/><br/>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
@foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
        </td>
        <td>
            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>
    {{$categories->links()}}
@endsection