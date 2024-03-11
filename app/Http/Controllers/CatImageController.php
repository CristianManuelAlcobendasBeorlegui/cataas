<?php

namespace App\Http\Controllers;

use App\Models\CatImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatImageRequest;
use App\Http\Requests\UpdateCatImageRequest;
use Illuminate\Http\Request;

class CatImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $tag = $request->input('tags');
        $offset = (($request->input('offset')  != null) ? $request->input('offset') : 0);
        $limit = (($request->input('limit') != null) ? $request->input('limit') : 10);
        $cats = CatImage::select('image_id', 'tags')
                    ->where('tags', 'like', '%' . $tag . '%')
                    ->offset($offset)
                    ->take($limit)
                    ->get();
        return $cats;
    }

    public function gatitos(Request $request) {        
        $tag = $request->input('tags');
        $offset = (($request->input('offset')  != null) ? $request->input('offset') : 0);
        $limit = (($request->input('limit') != null) ? $request->input('limit') : 10);
        
        $curl = curl_init('http://localhost/api/cats'); 
        curl_setopt($curl, CURLOPT_PORT, 8000); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 8000); 
        $cats = curl_exec($curl);
        return view('cats.index', ['cats', $cats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatImageRequest $request) 
    {
        // CatImage::create($request->all());
        $cat = CatImage::create([
            'image_id' => $request->input('image_id'),
            'mimetype' => $request->input('mimetype'),
            'size' => $request->input('size'),
            'tags' => $request->input('tags'),
        ]);

        return response()->json($cat);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatImage $catImage)
    {
        return response()->json($catImage);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatImage $catImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatImageRequest $request, CatImage $catImage)
    {
        $catImage->update([
            'image_id' => $request->input('image_id'),
            'mimetype' => $request->input('mimetype'),
            'size' => $request->input('size'),
            'tags' => $request->input('tags'),
        ]);

        /** 
         * Hace lo mismo pero en version JAVA
         * 
         * $catImage->image_id = $request->input('image_id');
         * $catImage->mimetype = $request->input('mimetype');
         * $catImage->size = $request->input('size');
         * $catImage->tags = $request->input('tags')
         * $catImage->save();
         * */

         return response()->json($catImage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatImage $catImage)
    {
        if (isset($catImage)) {
            $catImage->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
        
    }
}
