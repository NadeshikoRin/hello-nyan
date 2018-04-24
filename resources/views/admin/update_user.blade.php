@extends('layout.head_admin')
@section('content')
    <br>
    <h4>Update User</h4>
    <hr align="left" width="22%">
    <br>
    <div class="row">
        <div class="col s8">
            <table class="striped centered">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Role</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user["user_id"]}}</td>
                        <td>{{$user["user_name"]}}</td>
                        <td>{{$user["user_role"]}}</td>
                        <td><form action="{{url('/BonRegist/updateUser/'.$user->user_id.'/edit')}}"><button class="waves-effect waves-light btn">UPDATE</button></form></td>
                        <td><form action="{{url('/BonRegist/updateUser/'.$user->user_id.'/delete')}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="waves-effect waves-light button-del" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection