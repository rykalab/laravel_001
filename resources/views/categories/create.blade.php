@extends('layouts.app')

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection