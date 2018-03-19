@extends('layouts.app')

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        {{csrf_field()}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $category->name }}" name="name">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection