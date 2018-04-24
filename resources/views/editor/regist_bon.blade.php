@extends('layout.head_editor')
@section('content')
    <br><br><br><br>
    <div class="center-align">
        <div class="row">
        </div>
        <form class="col s8" role="form" method="POST" action="{{ url('/BonRegist/registBon/data') }}">
            {{ csrf_field() }}

            <div class="row">
                <h4>Regist Bon Baru</h4>
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
                    <br><br>
                    <input type="date" class="validate" id="tanggal" name="tanggal">
                    <label for="tanggal">Tanggal *</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="jenis" type="text" class="validate" name="jenis" data-length="40">
                    <label for="jenis">Jenis *</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="jumlah" type="tel" class="validate" name="jumlah" data-length="8" min="0" max="25000000">
                    <label for="jumlah">Jumlah *</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input placeholder="" id="pic" type="text" class="validate" name="pic" data-length="20">
                    <label for="pic">PIC *</label>
                </div>
            </div>

            <br><label>* required</label>
            <br><br>
            <button type="submit" class="waves-effect waves-light btn-large">Register</button>

        </form>


    </div>
    </div>

@endsection