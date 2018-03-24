@extends('layouts.app')

@section('title','Super')

@section('content')
<a href="{{ route('comments.create') }}" class="btn btn-success">Dodaj</a><br/><br/>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Content</th>
        <th>Article</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
@foreach($comments as $comment)
    <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->content}}</td>
        <td>
            @if ($comment->article)
                {{$comment->article()->first()->title}}
            @endif
        </td>
        <td>
            <a class="btn btn-primary" href="{{ route('comments.edit', $comment->id) }}">Edit</a>
        </td>
        <td>
            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</table>
    {{$comments->links()}}
@endsection