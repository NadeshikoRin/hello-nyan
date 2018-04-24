@extends('layout.head_admin')
@section('content')
    <br><br><br><br>
    <div class="center-align">
        <div class="row">
        </div>
        <form class="col s8" role="form" method="POST" action="{{ url('/BonRegist/updateUser/'.$user->user_id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">
                <h4>Update User</h4>
                <hr width="30%">
            </div>
            {{--<div id="error-wrap">--}}
                {{--<div class="error">--}}
                    {{--@if($errors)--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--*{{$error}}--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input disabled placeholder="" id="user_id" type="text" class="validate" name="user_id" data-length="15" value="{{$user->user_id}}">
                    <label for="user_id">User ID</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="newName" type="text" class="validate" name="newName" data-length="25" value="{{$user->user_name}}">
                    <label for="newName">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="newPassword" type="password" class="validate" name="newPassword" data-length="20">
                    <label for="newPassword">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="left-align">
                    <div class="col s3"></div>
                    <label for="newRole">Role: </label>
                    <input class="with-gap" name="newRole" type="radio" id="editor" value="Editor" checked="checked" />
                    <label for="editor">Editor</label>
                    <input class="with-gap" name="newRole" type="radio" id="admin" value="Admin" />
                    <label for="admin">Admin</label>
                </div>
            </div>
            <br>
            <button type="submit" class="waves-effect waves-light btn-large">Add User</button>
        </form>


    </div>
    </div>
@endsection