@extends('layouts.app')

@section('content')
<form action="{{ route('users.update', $user->id)}}" method="post">
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
        <input type="hidden" name="_method" value="put">
        Imie
        <div class="form-group">
            <input placeholder="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            {{--  //zmienic value sprawdzic czy haslo jest zmieniane jesli nie nie updatowac na bazie  --}}
        Hasło
            <input placeholder="password" type="password" class="form-control" name="password" value="">
         </div>
        Powtórz hasło
        <div class="form-group">
            <input placeholder="password" type="password" class="form-control" name="password_new" value="">
         </div>
        Email
        <div class="form-group">
            <input placeholder="email" type="text" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        Rola
        <div class="form-group">
            @foreach($roles as $role)
                <label>
                    @if(in_array($role->id, $flatSelectedRoles))
                        <input type="checkbox" checked name="role_id[]" value="{{$role->id}}"/> {{$role->name}}
                    @else
                        <input type="checkbox" name="role_id[]" value="{{$role->id}}"/> {{$role->name}}
                    @endif
                </label>
            @endforeach
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Zapisz</button>
        </div>
    </form>
@endsection