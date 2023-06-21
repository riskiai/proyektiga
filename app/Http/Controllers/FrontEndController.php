<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProfileDesa;
use App\Models\statistik;
use App\Models\Statistik as ModelsStatistik;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Product $product)
    {
        $products = Product::with(['galleries'])->first()->get();
        $profile = ProfileDesa::all();
        $testimonials = Testimonial::all();
        // $users = statistik::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_penjualan) as month_name"))
        // ->whereYear('tgl_penjualan', date('Y'))
        // ->groupBy(DB::raw("month_name"))
        // ->orderBy('tgl_penjualan','ASC')
        // ->pluck('count', 'month_name');
        // $labels = $users->keys();

        // $data = statistik::orderBy('tgl_penjualan')->pluck('terjual');
        $monthlySales = statistik::selectRaw('sum(terjual) as total_penjualan, MONTHNAME(tgl_transaksi) as month_name, year(tgl_transaksi) as year')
        ->orderBy('tgl_transaksi','ASC')
        ->groupBy('month_name', 'year')
        ->get();

        $labels = $monthlySales->pluck('month_name')->toArray();
        $data = $monthlySales->pluck('total_penjualan')->toArray();

        return view('pages.frontend.index',compact('products','testimonials','labels','data','profile'));
    }

    public function details(Request $request, $id)
    {
        $product = Product::with(['galleries','comments'])->where('id',$id)->firstOrFail();
        $statistik = DB::table('statistiks')
        ->join('products', function ($join) {
           $join->on('products.id', '=', 'statistiks.products_id');
       })
           ->select('name', DB::raw('sum(terjual) as total_penjualan'))
           ->groupBy('products_id', 'name')
           ->where('products.id', '=', $product->id)
           ->get();
        return view('pages.frontend.details',compact('product','statistik'));
    }

    public function profile(Request $request, $id){

        $profile = ProfileDesa::all();
        return view('pages.frontend.profile',compact('profile'));
    }
}
