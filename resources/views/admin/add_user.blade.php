@extends('layout.head_admin')
@section('content')
    <br><br><br><br>
    <div class="center-align">
        <div class="row">
        </div>
        <form class="col s8" role="form" method="POST" action="{{ url('/BonRegist/addUser/data') }}">
            {{ csrf_field() }}

            <div class="row">
                <h4>Add New User</h4>
                <hr width="30%">
            </div>
            <div id="error-wrap">
                <div class="error">
                    @if($errors)
                        @foreach($errors->all() as $error)
                            *{{$error}}
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="user_id" type="text" class="validate" name="user_id" data-length="15">
                    <label for="user_id">User ID</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="nama" type="text" class="validate" name="nama" data-length="25">
                    <label for="nama">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="password" type="password" class="validate" name="password" data-length="20">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="left-align">
                    <div class="col s3"></div>
                    <label for="role">Role: </label>
                    <input class="with-gap" name="role" type="radio" id="editor" value="Editor" checked="checked" />
                    <label for="editor">Editor</label>
                    <input class="with-gap" name="role" type="radio" id="admin" value="Admin" />
                    <label for="admin">Admin</label>
                </div>
            </div>
            <br>
            <button type="submit" class="waves-effect waves-light btn-large">Add User</button>
        </form>


    </div>
    </div>
@endsection