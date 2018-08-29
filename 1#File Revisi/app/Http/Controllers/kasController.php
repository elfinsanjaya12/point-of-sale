<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

use App\Kas;

class kasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
      $user = $request->user();

      if ($user->hasRole('penjaga') || $user->hasRole('pemilik')) {
          $kases = Kas::orderBy('tanggal','desc')->paginate(10);
          return view('kas.index',['kases'=>$kases]);
      }
    }

    public function lihat_tanggal(Request $request){
      $user = $request->user();
      $tanggal = $request->tanggal;

      if ($user->hasRole('penjaga') || $user->hasRole('pemilik')) {
        $kas =  DB::table('kas')
                  ->whereBetween('tanggal', [$request->tanggalawal, $request->tanggalakhir])
                  ->get();

        foreach ($kas as $kas) {
          if ($kas->id_pembelian == null) {
            // penjualan
            $kases = Kas::select(DB::raw("penjualans.id, kode_kas, penjualans.kode_penjualan,  kas.tanggal, keterangan, debit, kredit,  saldo"))
                    ->join('penjualans', 'kas.id_penjualan', '=', 'penjualans.id')                  
                    ->get();
            // $no_transaksi = $kas->kode_penjualan;
          }else{
            // pembelian
            $kases = Kas::select(DB::raw("pembelians.id, kode_kas, pembelians.kode_pembelian,  kas.tanggal, keterangan, debit, kredit,  saldo"))
                    ->join('pembelians', 'kas.id_pembelian', '=', 'pembelians.id')                  
                    ->get();
            // $no_transaksi = $kas->kode_pembelian;
          }
        }

        // $kases = Kas::select(DB::raw("kode_kas, penjualans.kode_penjualan, pembelians.kode_pembelian,  kas.tanggal, keterangan, debit, kredit,  saldo"))
        //             ->join('penjualans', 'kas.id_penjualan', '=', 'penjualans.id')
        //             ->join('pembelians', 'kas.id_pembelian', '=', 'pembelians.id')                  
        //             ->whereBetween('kas.tanggal', [$request->tanggalawal, $request->tanggalakhir])
        //             ->get();

          // dd($no_transaksi);
        // dd($kases);
        $kas_total =  Kas::orderBy('id','desc')->first()->saldo;

        $total_kredit= 0;
        $total_debit= 0;
        
        foreach ($kases as $kas) {
          $total_kredit += $kas->kredit;
          $total_debit += $kas->debit;
        }

        // return view('laporan._penjualan',['laps'=>$laps,'harga_total'=>$harga_total, 'awal'=>$request->tanggalawal,'akhir'=>$request->tanggalakhir]);
                      // dd($kases, $kas_total);
        return view('kas.lihatdata',['kases'=>$kases,'kas_total'=>$kas_total, 'awal'=>$request->tanggalawal,'akhir'=>$request->tanggalakhir, 'total_kredit'=> $total_kredit, 'total_debit'=> $total_debit]);

      }
    }

    // tidak terpakai
    public function cetak(Request $request,$id){
      $user = $request->user();

      if ($user->hasRole('penjaga') || $user->hasRole('pemilik')) {
        $kases = Kas::where('tanggal', $id)
                   ->orderBy('tanggal', 'desc')
                   ->get();        
         $total = Kas::orderBy('id','desc')->first()->saldo;
         // dd('total : '+$total);
        return view('kas.cetak',['kases'=>$kases,'total'=>$total]);
      }
    }

    public function cetak_kas(Request $request,$awal,$akhir){
      $user = $request->user();

      if ($user->hasRole('penjaga') || $user->hasRole('pemilik')) {
        $kases =  DB::table('kas')
                  ->whereBetween('tanggal', [$awal, $akhir])
                  ->get();
        $kas_total =  Kas::orderBy('id','desc')->first()->saldo;
        // dd($kases, $kas_total);
        // dd($awal, $akhir);

        $total_kredit= 0;
        $total_debit= 0;
        
        foreach ($kases as $kas) {
          $total_kredit += $kas->kredit;
          $total_debit += $kas->debit;
        }
        
        return view('kas.cetak',['kases'=>$kases,'kas_total'=>$kas_total, 'awal'=>$awal,'akhir'=>$akhir, 'total_kredit'=> $total_kredit, 'total_debit'=> $total_debit]);

      }
    }
}
