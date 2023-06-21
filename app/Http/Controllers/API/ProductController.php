<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('id');
        $description = $request->input('description');
        $tags = $request->input('tags');
        $categories = $request->input('categories');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        
        

            // $product = Product::with(['category', 'galleries']);
            // if ($product) {
            //         $galleries = $product->galleries;

            //         foreach ($galleries as $gallery) {
            //             $gallery->url = str_replace('public', 'storage', $gallery->url); // Ubah URL sesuai kebutuhan Anda
            //             $gallery->save();
            //         }
            //     }
                 
            // ($product->galleries->url);
            // str_replace('World', 'Laravel', $product->galleries->url);
            
            // if($product){
            //     return ResponseFormatter::success(
            //         $product,
            //         'Data Produk berhasil di ambil'
            //     );
            // }
            // else{
            //     return ResponseFormatter::error(
            //         null,
            //         'Data Produk tidak ada',
            //         404
            //     );
            // }
        

        // $product = Product::with(['category', 'galleries']);

        // if($name)
        // {
        //     $product->where('name','Like','%' . $name . '%');
        // }
        // if($description)
        // {
        //     $product->where('description','Like','%' . $description . '%');
        // }
        // if($tags)
        // {
        //     $product->where('tags','Like','%' . $tags . '%');
        // }
        // if($price_from)
        // {
        //     $product->where('price','>=', $price_from);
        // }
        // if($price_to)
        // {
        //     $product->where('price','<=', $price_to);
        // }
        // if($categories)
        // {
        //     $product->where('price', $categories);
        // }
        // if($id)
        // {
        //     $product->where('id', $id);
        // }
        
        // return ResponseFormatter::success(
        //     $product->paginate($limit,10),
        //     'Data Produk berhasil di ambil',
        //     404
        // );

        // $product = Product::with(['category', 'galleries']);
        // if ($name) {
        //     $product->where('name', 'LIKE', '%' . $name . '%');
        // }
        // if ($description) {
        //     $product->where('description', 'LIKE', '%' . $description . '%');
        // }
        // if ($tags) {
        //     $product->where('tags', 'LIKE', '%' . $tags . '%');
        // }
        // if ($price_from) {
        //     $product->where('price', '>=', $price_from);
        // }
        // if ($price_to) {
        //     $product->where('price', '<=', $price_to);
        // }
        // if ($categories) {
        //     $product->where('categories_id', $categories);
        // }
        // if ($id) {
        //     $product->where('id', $id);
        // }
        
        // // $product = $product->paginate($limit, ['*'], 'page', 10);
        
        // foreach ($product as $item) {
        //     $galleries = $item->galleries;
        
        //     foreach ($galleries as $gallery) {
        //         $gallery->url = str_replace('public', 'storage', $gallery->url); // Ubah URL sesuai kebutuhan Anda
        //         $gallery->save();
        //     }
        // }
        
        // return ResponseFormatter::success(
        //     $product->get(),
        //     // $product,
        //     'Data Produk berhasil diambil',
        //     200
        // );

        $query = Product::with(['category', 'galleries']);

        if ($id) {
            $query->where('id', $id);
        }
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($description) {
            $query->where('description', 'LIKE', '%' . $description . '%');
        }
        if ($tags) {
            $query->where('tags', 'LIKE', '%' . $tags . '%');
        }
        if ($price_from) {
            $query->where('price', '>=', $price_from);
        }
        if ($price_to) {
            $query->where('price', '<=', $price_to);
        }
        if ($categories) {
            $query->where('category_id', $categories);
        }

        if ($limit) {
            $query->limit($limit);
        }

        $products = $query->get();

        // $productsForWebsite = $products->map(function ($product) {
        //     return $product->replicate();
        // });

        $transformedProducts = $products->map(function ($product) {
            $galleries = $product->galleries;

            $transformedGalleries = $galleries->map(function ($gallery) {
                $gallery->url = str_replace('public', 'storage', $gallery->url);
                return $gallery;
            });

            $product->galleries = $transformedGalleries;
            return $product;
        });
        
    

        return ResponseFormatter::success(
            $products,
            'Data Produk berhasil diambil',
            200
        );
                
    }
}
