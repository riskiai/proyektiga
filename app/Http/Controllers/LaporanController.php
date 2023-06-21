<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        return view('pages.dashboard.laporan.index');
    }

    public function cetak_pdf(Request $request){
        $dari_tgl = $request->dari_tgl;
        $sampai_tgl = $request->sampai_tgl;

        $transaksi = DB::table('products')
        ->join('statistiks', function ($join) {
            $join->on('products.id', '=', 'statistiks.products_id');
        })
        ->when($request->dari_tgl, function ($query) use ($request) {
            $dari_tgl = $request->dari_tgl;
            $sampai_tgl = $request->sampai_tgl;
            $query
            ->whereBetween('tgl_transaksi', [$dari_tgl, $sampai_tgl]);
        })
        ->paginate($request->limit ?  $request->limit : 50);
         $transaksi->appends($request->only('dari_tgl','sampai_tgl'));


         $total = Statistik::select(DB::raw('sum(products.price * terjual) as total'))
         ->join('products', function ($join) {
            $join->on('products.id', '=', 'statistiks.products_id');
        })
        ->when($request->dari_tgl, function ($query) use ($request) {
            $dari_tgl = $request->dari_tgl;
            $sampai_tgl = $request->sampai_tgl;
            $query
            ->whereBetween('tgl_transaksi', [$dari_tgl, $sampai_tgl]);
        })->get();


         $data = DB::table('statistiks')
         ->join('products', function ($join) {
            $join->on('products.id', '=', 'statistiks.products_id');
        })
            ->select('name', DB::raw('sum(terjual) as total_penjualan'))
            ->when($request->dari_tgl, function ($query) use ($request) {
                $dari_tgl = $request->dari_tgl;
                $sampai_tgl = $request->sampai_tgl;
                $query
                ->whereBetween('tgl_transaksi', [$dari_tgl, $sampai_tgl]);
            })
            ->groupBy('products_id', 'name')
            ->get();

        $pdf = PDF::loadview('pages.dashboard.laporan.pdf', ['data' => $data, 'transaksi' => $transaksi, 'dari_tgl' => $dari_tgl, 'sampai_tgl' => $sampai_tgl, 'total' => $total]);
        return $pdf->stream('struk-pdf');

    }
}
