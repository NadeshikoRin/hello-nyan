@extends('layout.head_login')
@section('content')
    <br><br><br><br><br>
    <div class="center-align">
        <div class="row">
        </div>
        <form class="col s8" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="row">
                <h4>Login</h4>
                <hr width="20%">
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
                <div class="input-field col s3"></div>
                <div class="input-field col s6">
                    <input id="user_id" type="text" class="validate" name="user_id">
                    <label for="user_id">User ID</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3"></div>
                <div class="input-field col s6">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Password</label>
                </div>
            </div><br>
            <button type="submit" class="waves-effect waves-light btn-large">Login</button>
        </form>
    </div>
    </div>


@endsection