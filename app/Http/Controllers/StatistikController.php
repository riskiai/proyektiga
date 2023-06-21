<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatistikRequest;
use App\Models\Product;
use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Statistik::with('products');

            return DataTables::of($query)
            ->addColumn('action', function ($item) {
                return '
                <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                    href="' . route('dashboard.statistik.edit', $item->id) . '">
                    Edit
                </a>
                <form class="inline-block" action="' . route('dashboard.statistik.destroy', $item->id) . '" method="POST">
                <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                    Hapus
                </button>
                    ' . method_field('delete') . csrf_field() . '
                </form>';
            })
            ->editColumn('tgl_transaksi', function ($item) {
                return ($item->tgl_transaksi)->format('d/m/Y');;
            })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.statistik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.dashboard.statistik.create', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatistikRequest $request)
    {
        $data = $request->all();

        Statistik::create($data);

        return redirect()->route('dashboard.statistik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistik $statistik)
    {
        $products = Product::all();
        return view('pages.dashboard.statistik.edit',[
            'item' => $statistik,
            'products'=> $products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatistikRequest $request,Statistik $statistik)
    {
        $data = $request->all();

        $statistik->update($data);

        return redirect()->route('dashboard.statistik.index')->with('success','Product has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistik $statistik)
    {
        $statistik->delete();
        return redirect()->route('dashboard.statistik.index')->with('success','Product has been Deleted');
    }
}
