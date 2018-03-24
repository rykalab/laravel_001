@extends('layouts.app')

@section('content')
    <form enctype="multipart/form-data" action="{{ route('files.store') }}" method="POST">
        {{csrf_field()}}
        Wybierz plik który chcesz dodać na serwer
        <div class="form-group">
            <input type="file" class="form-control" name="file_name">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection
