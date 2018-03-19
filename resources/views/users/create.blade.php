@extends('layouts.app')

@section('content')
  <form action="{{ route('users.store')}}" method="post">
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
      Imie
      <div class="form-group">
          <input placeholder="name" type="text" class="form-control" name="name">
      </div>
      Hasło
      <div class="form-group">
          <input placeholder="password" type="text" class="form-control" name="password">
       </div>
       Email
      <div class="form-group">
          <input placeholder="email" type="text" class="form-control" name="email">
       </div>
       <div class="form-group">
          <button class="btn btn-primary">Zapisz</button>
      </div>
  </form>
@endsection