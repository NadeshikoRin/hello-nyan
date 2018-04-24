<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'trans_id';
    protected $fillable = [
        'trans_tanggal', 'trans_jenis', 'trans_jumlah','trans_pic','trans_transfer','trans_kwitansi','trans_payment','trans_kembali','trans_status',
    ];
    protected $table = 'transactions';
    public $timestamps= false;
}
