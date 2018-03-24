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
            <input placeholder="password" type="password" class="form-control" name="password">
        </div>
        Powtórz hasło
        <div class="form-group">
            <input placeholder="password" type="password" class="form-control" name="password_new">
        </div>
        Email
        <div class="form-group">
            <input placeholder="email" type="text" class="form-control" name="email">
        </div>
        Wybierz rolę
        <div class="form-group">
                @foreach ($roles as $role)
                {{$role->name}}
                <input type="checkbox" name="roles_id[]" value="{{$role->id}}">
                @endforeach
             </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
  </form>
@endsection