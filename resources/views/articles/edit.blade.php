@extends('layouts.app')

@section('content')
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $article->title }}" name="title">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="body">{{ $article->body }}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection