@extends('layout.head_editor')
@section('content')
    <br>
    <h4>Update Bon</h4>
    <hr align="left" width="20%"><br>
    <form action="{{url('/BonRegist/updateBon/sorted')}}" method="get">
        <label>Sort By Month</label>
        <select class="browser-default col s6" name="bulan">
            <option value="" disabled selected>Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
        <select class="browser-default col s6" name="tahun">
            <option value="" disabled selected>Pilih Tahun</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
            <option value="2031">2031</option>
            <option value="2032">2032</option>
            <option value="2033">2033</option>
            <option value="2034">2034</option>
            <option value="2035">2035</option>
            <option value="2036">2036</option>
            <option value="2037">2037</option>
            <option value="2038">2038</option>
        </select>
        <button class="waves-effect waves-yellow button-sort">Sort</button>
        <div id="error-wrap">
            <div class="error">
                @if($errors)
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @endif
            </div>
        </div>
    </form>
    @php
    $count = 25000000;
    @endphp
    @foreach($transactions as $transaction)
        @if(empty($transfer)&&empty($kwitansi)&&empty($payment)&&empty($kembali))
            @php
                $count = $count - $transaction['trans_jumlah'];
            @endphp
        @endif
    @endforeach
    <div class="kas-kecil">Kas Kecil: Rp<?php echo number_format($count, 0, ".","."); ?>,-</div>
    <hr>
    <div class="row">
        <div class="col s12">
            <table class="striped centered">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>PIC</th>
                    <th>Transfer</th>
                    <th>Kwitansi</th>
                    <th>Payment</th>
                    <th>Kembali</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>
                @foreach($transactions as $transaction)
                    @php
                        $transfer = $transaction["trans_transfer"];
                        $kwitansi = $transaction["trans_kwitansi"];
                        $payment = $transaction["trans_payment"];
                        $kembali = $transaction["trans_kembali"];
                    @endphp

                    <tr>
                        <td><?php echo date('d-m-Y', strtotime($transaction["trans_tanggal"])); ?></td>
                        <td>{{$transaction["trans_jenis"]}}</td>
                        <td>Rp{{number_format($transaction["trans_jumlah"],0,".",".")}},-</td>
                        <td>{{$transaction["trans_pic"]}}</td>
                        @if(!empty($transfer))
                            <td><?php echo date('d-m-Y', strtotime($transfer)); ?></td>
                        @else
                            <td>-</td>
                        @endif
                        @if(!empty($kwitansi))
                            <td><?php echo date('d-m-Y', strtotime($kwitansi)); ?></td>
                        @else
                            <td>-</td>
                        @endif
                        @if(!empty($payment))
                            <td><?php echo date('d-m-Y', strtotime($payment)); ?></td>
                        @else
                            <td>-</td>
                        @endif
                        @if(!empty($kembali))
                            <td><?php echo date('d-m-Y', strtotime($kembali)); ?></td>
                        @else
                            <td>-</td>
                        @endif

                        @if(!empty($transfer)&&!empty($kwitansi)&&!empty($payment)&&!empty($kembali))
                            <td>Selesai</td>
                            <td><button class="btn disabled">Update</button></td>
                        @else
                            <td>Belum Selesai</td>
                            <td><a href="{{url('/BonRegist/updateBon/editTrans/'.$transaction->trans_id)}}"><button type="submit" class="waves-effect waves-light btn">Update</button></a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div align="center">
        {{ $transactions->appends($_GET)->links() }}

    </div>

@endsection