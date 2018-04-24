<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;

class EditorController extends Controller
{
    public function showHome(){
        $transactions = Transaction::all();
        return view('editor.home_editor')->with("transactions", $transactions);
    }

    public function showRegistBon(){
        return view('editor.regist_bon');
    }

    public function showUpdateBon(){
        $transactions = Transaction::orderBy('trans_tanggal', 'desc')->paginate(20);
        return view('editor.update_bon')->with("transactions", $transactions);
    }

    public function editTrans($id){
        $transaction = Transaction::find($id);

        return view('editor.update_trans')->with("transaction", $transaction);
    }

    public function updateTrans(Request $request, $id){
        $this->validate($request,  [
            "newTransfer" => "max:10",
            "newKwitansi" => "max:10",
            "newPayment" => "max:10",
            "newKembali" => "max:10",
        ],[
            "newTransfer.max" => "Format tanggal Transfer tidak sesuai!",
            "newKwitansi.max" => "Format tanggal Kwitansi tidak sesuai!",
            "newPayment.max" => "Format tanggal Payment tidak sesuai!",
            "newKembali.max" => "Format tanggal Kembali tidak sesuai!",
        ]);

        $transaction = Transaction::find($id);

        if ($request->newTransfer == ""){
            $transaction->trans_transfer = null;
        }
        else{
            $transaction->trans_transfer = $request->newTransfer;
        }
        if ($request->newKwitansi == ""){
            $transaction->trans_kwitansi = null;
        }
        else{
            $transaction->trans_kwitansi = $request->newKwitansi;
        }
        if ($request->newPayment == ""){
            $transaction->trans_payment = null;
        }
        else{
            $transaction->trans_payment = $request->newPayment;
        }
        if ($request->newKembali == ""){
            $transaction->trans_kembali = null;
        }
        else{
            $transaction->trans_kembali = $request->newKembali;
        }

        $transaction->save();

        return redirect('/BonRegist/updateBon');
    }

    public function registNewBon(Request $request){
        $this->validate($request,  [
            "tanggal" => "required",
            "jenis" => "required|max:40",
            "jumlah" => "required|numeric|min:0|max:25000000",
            "pic" => "alpha|required|max:20",
        ],[
            "tanggal.required" => "Tanggal harus diisi!",
            "jenis.required" => "Jenis harus diisi!",
            "jumlah.required" => "Jumlah harus dipilih!",
            "pic.required" => "PIC harus dipilih!",
            "jenis.max" => "Jenis tidak boleh melebihi 40 karakter!",
            "jumlah.max" => "Jumlah tidak boleh melebihi 25000000!",
            "jumlah.min" => "Jumlah tidak boleh kurang dari 0!",
            "jumlah.numeric" => "Jumlah harus dalam bentuk angka!",
            "pic.alpha" => "PIC harus dalam bentuk huruf!",
            "pic.max" => "PIC tidak boleh melebihi 20 karakter!",
        ]);


        $newTransaction = new Transaction();
        $newTransaction->trans_tanggal = $request->tanggal;
        $newTransaction->trans_jenis = $request->jenis;
        $newTransaction->trans_jumlah = $request->jumlah;
        $newTransaction->trans_pic = $request->pic;

        $newTransaction->save();

        return redirect("/BonRegist/updateBon");
    }

    public function sortByDate(Request $request){
        $bulan = $request['bulan'];
        $tahun = $request['tahun'];
        $this->validate($request,  [
            "bulan" => "required",
            "tahun" => "required",
        ],[
            "bulan.required" => "*Bulan harus dipilih!",
            "tahun.required" => "*Tahun harus dipilih!",
        ]);

        $transactions = Transaction::where('trans_tanggal', 'LIKE', "$tahun-$bulan%")->paginate(20);
        return view('editor.update_bon')->with([
            'transactions' => $transactions
        ]);
    }
}
