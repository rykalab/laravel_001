@extends('layouts.app')

@section('content')
  <form action="{{ route('articles.store')}}" method="post">
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
      <div class="form-group">
          <input type="text" class="form-control" name="title">
      </div>
      <div class="form-group">
          <textarea class="form-control" rows="5" name="body"></textarea>
      </div>
      <div class="form-group">
        <select name="category_id" class="form-control" id="">
            @foreach ($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
     </div>
     <div class="form-group">
        @foreach ($files as $file)
        <label for="">
            <img src="/storage/thumbs/thumb_{{$file->file_name}}" alt="">
        <input type="checkbox" name="files_id[]" value="{{$file->id}}">
        </label>
        @endforeach
     </div>
      <div class="form-group">
          <button class="btn btn-primary">Zapisz</button>
      </div>
  </form>
@endsection