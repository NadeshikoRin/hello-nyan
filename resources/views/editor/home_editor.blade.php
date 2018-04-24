@extends('layout.head_editor')
@section('content')

    <marquee>Welcome to Bon Regist! Hello, ! Have a Good Day~</marquee>
    <br><br><br>
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
    <div class="kas-kecil-curr">Kas Kecil Saat Ini: Rp<?php echo number_format($count, 0, ".","."); ?>,-</div>
    <br>
    <h4>Pending Transaction</h4>
    <hr align="left" width="33%">
    <br>
    <div class="row">
        <div class="col s11">
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

                    @if(!empty($transfer)&&!empty($kwitansi)&&!empty($payment)&&!empty($kembali))

                    @else
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
                            @else
                                <td>Belum Selesai</td>
                            @endif
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection