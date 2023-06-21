<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{

    public function index()
    {
        if(request()->ajax())
        {
            $query = Comment::query();
            return DataTables::of($query)
            ->addColumn('action', function ($item) {
                return '
                    <form class="inline-block" action="' . route('dashboard.comment.destroy', $item->id) . '" method="POST">
                    <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                        Hapus
                    </button>
                        ' . method_field('delete') . csrf_field() . '
                    </form>';
            })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.komentar.index');
    }


    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required|string',
            'body'=>'required'
        ]);

        $data = $request->all();

        Comment::create([
            'products_id' => $request->id,
            'name' => $request->name,
            'body' => $request->body,
        ]);

        return redirect()->route('details', $request->id)->with('Berhasil tambahkan komentar');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('dashboard.comment.index')->with('success','komentar has been Deleted');

    }
}
