@extends('layouts.app')

@section('title','Cosfajnego')

@section('content')
<a href="{{ route('articles.create') }}" class="btn btn-success">Dodaj</a><br/><br/>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
@foreach($articles as $article)
    <tr>
        <td>{{$article->id}}</td>
        <td>{{$article->title}}</td>
        <td>{{$article->body}}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('articles.edit', $article->id) }}">Edit</a>
        </td>
        <td>
            <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>
    {{$articles->links()}}
@endsection