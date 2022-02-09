<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Services\ApiService;
use App\Http\Requests\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * API Client
     */
    protected $client;

    /**
     * Guzzle API Client instance
     */
    public function __construct()
    {
        $this->client = new ApiService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Gallery";
        $res = $this->client->get('gallery');

        $images = $res->data;
        return view('gallery.index', compact('images', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $request = $request->validated();

        $request['path'] = $request['image']->store('gallery');

        $res = $this->client->post('gallery/store', Arr::only($request, ['title', 'uploader', 'path']));

        return $res->status ?
            back()->with('status', $res->message ?? 'Action successful'):
            back()->withErrors($res->errors ?? 'Something went wrong..');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
