<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Testimonial $testimonial)
    {
        if(request()->ajax())
        {
            $query = Testimonial::query();

            return DataTables::of($query)
            ->addColumn('action', function ($item) {
                return '
                <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                    href="' . route('dashboard.testimonial.edit', $item->id) . '">
                    Edit
                </a>
                <form class="inline-block" action="' . route('dashboard.testimonial.destroy', $item->id) . '" method="POST">
                <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                    Hapus
                </button>
                    ' . method_field('delete') . csrf_field() . '
                </form>';
            })
            ->editColumn('url', function ($item) {
                return '<img style="max-width: 150px;" src="'. Storage::url($item->url) .'"/>';
            })
                ->rawColumns(['action','url'])
                ->make();
        }
        return view('pages.dashboard.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('pages.dashboard.testimonial.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request, Testimonial $testimonial)
    {

        $input = $request->all();

        if ($image = $request->file('files')) {
            $destinationPath = 'storage/gallery';
            $profileImage = "public/gallery/". date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['url'] = "$profileImage";
        }

        Testimonial::create($input);


        return redirect()->route('dashboard.testimonial.index');
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
    public function edit(Testimonial $testimonial)
    {
        return view('pages.dashboard.testimonial.edit',[
            'item' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request,Testimonial $testimonial)
    {

        $input = $request->all();

        if ($image = $request->file('files')) {
            $destinationPath = 'storage/gallery';
            $profileImage = "public/gallery/". date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['url'] = "$profileImage";
        }else{
            unset($input['url']);
        }

        $testimonial->update($input);

        return redirect()->route('dashboard.testimonial.index')->with('success','Testimonial has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('dashboard.testimonial.index', $testimonial->id);

    }
}
