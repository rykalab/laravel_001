@extends('layouts.app') @section('title','Userzy') @section('content')
<a href="{{ route('users.create')}}" class="btn btn-success">Dodaj</a><br/><br/>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            @foreach($roles as $role)
                <label>
                    @if(in_array($role->id, $flatSelectedRoles))
                        <input type="checkbox" checked name="role_id[]" value="{{$role->id}}"/> {{$role->name}}
                    @else
                        {{--  <input type="checkbox" name="role_id[]" value="{{$role->id}}"/> {{$role->name}}  --}}
                    @endif
                </label>
            @endforeach
        </td>
        <td>
            <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a>
        </td>
        <td>
            <form method="post" action="{{route('users.destroy', $user->id)}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{$users->links()}}
@endsection