@extends('layouts.app')

@section('content')


   <form enctype="multipart/form-data" action="{{ route('files.update', $file->id)}}" method="post">
       {{ csrf_field() }}
       <input type="hidden" name="_method" value="put">
       Aktualny plik
       <div class="form-group">
                   <img width="200" src="/storage/thumbs/thumb_{{$file->file_name}}"/>
       </div>
       Wybierz plik który chcesz dodać na serwer
       <div class="form-group">
           <input type="file" class="form-control" name="file_name">
       </div>
       <div class="form-group">
           <button class="btn btn-primary">Zapisz</button>
       </div>
   </form>
@endsection