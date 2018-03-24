@extends('layouts.app')

@section('content')
  <form action="{{ route('comments.store') }}" method="post">
      {{ csrf_field() }}
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      Autor
      <div class="form-group">
          <input type="text" class="form-control" name="author">
      </div>
      Komentarz
      <div class="form-group">
          <textarea class="form-control" rows="5" name="content"></textarea>
      </div>
      <div class="form-group">
        <select name="article_id" class="form-control" id="">
            @foreach ($articles as $article)
               <option value="{{$article->id}}">{{$article->title}}</option>
            @endforeach
        </select>
     </div>
      <div class="form-group">
          <button class="btn btn-primary">Zapisz</button>
      </div>
  </form>
@endsection