@extends('layout.head_editor')
@section('content')
    <br><br><br><br>
    <div class="center-align">
        <div class="row">
        </div>
        <form class="col s8" role="form" method="POST" action="{{ url('/BonRegist/updateBon/editTrans/'.$transaction->trans_id.'/update') }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">
                <h4>Update Transaction</h4>
                <hr width="35%">
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
                    <input disabled value="{{$transaction->trans_tanggal}}" type="date" class="validate" id="tanggal" name="tanggal">
                    <label for="tanggal">Tanggal</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input disabled value="{{$transaction->trans_jenis}}" placeholder="" id="jenis" type="text" class="validate" name="jenis" data-length="40">
                    <label for="jenis">Jenis</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input disabled value="{{$transaction->trans_jumlah}}" placeholder="" id="jumlah" type="text" class="validate" name="jumlah" data-length="15">
                    <label for="jumlah">Jumlah</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <input disabled value="{{$transaction->trans_pic}}" placeholder="" id="pic" type="text" class="validate" name="pic" data-length="20">
                    <label for="pic">PIC</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <br><br>
                    <input value="{{$transaction->trans_transfer}}" type="date" class="validate" id="newTransfer" name="newTransfer" data-length="10">
                    <label for="newTransfer">Transfer</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <br><br>
                    <input value="{{$transaction->trans_kwitansi}}" type="date" class="validate" id="newKwitansi" name="newKwitansi" data-length="10">
                    <label for="newKwitansi">Kwitansi</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <br><br>
                    <input value="{{$transaction->trans_payment}}" type="date" class="validate" id="newPayment" name="newPayment" data-length="10">
                    <label for="newPayment">Payment</label>
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <br><br>
                    <input value="{{$transaction->trans_kembali}}" type="date" class="validate" id="newKembali" name="newKembali" data-length="10">
                    <label for="newKembali">Kembali</label>
                </div>
            </div>
            <br>
            <button type="submit" class="waves-effect waves-light btn-large">UPDATE</button>
        </form>
    </div>
    </div>

@endsection