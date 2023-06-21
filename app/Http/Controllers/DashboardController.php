<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ProfileDesa;
use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        /** Profile Desa */
        $profile = ProfileDesa::all();

        /** Laporan transaksi */

        $transaksi = DB::table('products')
        ->join('statistiks', function ($join) {
            $join->on('products.id', '=', 'statistiks.products_id');
        })
        ->orderBy('tgl_transaksi','desc')
        ->paginate($request->limit ?  $request->limit : 5);

        /*komentar */
        $komentar = Comment::orderBy('created_at','desc')
        ->paginate($request->limit ?  $request->limit : 5);

        /*statistiks */
        $monthlySales = statistik::selectRaw('sum(terjual) as total_penjualan, MONTHNAME(tgl_transaksi) as month_name, year(tgl_transaksi) as year')
        ->orderBy('tgl_transaksi','ASC')
        ->groupBy('month_name', 'year')
        ->get();

        $labels = $monthlySales->pluck('month_name')->toArray();
        $data = $monthlySales->pluck('total_penjualan')->toArray();

        return view('dashboard',compact('profile','transaksi','komentar','labels','data'));
    }
}
