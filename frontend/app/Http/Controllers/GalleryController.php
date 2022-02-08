<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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
        $this->client = new Client([
            'base_uri' => config('api.host'),
            'timeout'  => 2.0
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Gallery";
        $images = [];
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
        $res = $this->client->post('gallery/store', $request);

        return $res->status ?
            back()->with('status', $res->message ?? 'Action successful'):
            back()->withErrors($res->error ?? 'Something went wrong..');
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
