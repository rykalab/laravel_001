@extends('layouts.app')

@section('content')
    <form action="{{ route('articles.store') }}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="body"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection
