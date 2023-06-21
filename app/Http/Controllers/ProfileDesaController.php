<?php

namespace App\Http\Controllers;

use App\Models\ProfileDesa;

use App\Http\Requests\ProfileDesaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProfileDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        if(request()->ajax())
        {
            $query = ProfileDesa::query();

            return DataTables::of($query)
            ->addColumn('action', function ($item) {
                return '
                <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                    href="' . route('dashboard.profile.edit', $item->id) . '">
                    Edit
                </a>';
                // <form class="inline-block" action="' . route('dashboard.profile.destroy', $item->id) . '" method="POST">
                // <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                //     Hapus
                // </button>
                //     ' . method_field('delete') . csrf_field() . '
                // </form>';
            })
            ->editColumn('url', function ($item) {
                return '<img style="max-width: 150px;" src="'. Storage::url($item->url) .'"/>';
            })
                ->rawColumns(['action','url'])
                ->make();
        }
        return view('pages.dashboard.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('pages.dashboard.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($image = $request->file('files')) {
            $destinationPath = 'storage/gallery';
            $profileImage = "public/gallery/". date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['url'] = "$profileImage";
        }

        ProfileDesa::create($input);


        return redirect()->route('dashboard.profile.index');
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
    public function edit(ProfileDesa $profile)
    {
        return view('pages.dashboard.profile.edit',[
            'item' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileDesaRequest $request,ProfileDesa $profile)
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

        $profile->update($input);

        return redirect()->route('dashboard.profile.index')->with('success','Testimonial has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileDesa $profile)
    {
        $profile->delete();
        return redirect()->route('dashboard.profile.index', $profile->id);
    }
}
