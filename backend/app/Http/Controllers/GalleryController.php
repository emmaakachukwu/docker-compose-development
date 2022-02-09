<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json(['status' => true, 'data' => $images]);
    }

    public function store(Request $request)
    {
        $req = $request->all();
        $validator = Validator::make($req, [
            'title' => 'required|string|between:3,50',
            'uploader' => 'required|string|between:3,50',
            'path' => 'required|string'
        ]);

        if ( $validator->fails() )
            return response()->json(['status' => false, 'message' => 'incorrect input; please check and try again', 'errors' => $validator->errors()], 400);

        $image = Image::create($req);

        return response()->json(['status' => true, 'data' => $image]);
    }
}