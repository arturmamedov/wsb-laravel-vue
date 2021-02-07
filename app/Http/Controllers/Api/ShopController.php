<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Shop::latest()->get(); // latest is like orderBy('created_at', DESC)
        //return Shop::all()->sortByDesc('created_at'); // sort collection (not work cause Vue show things for it index key i think)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $product)
    {
        //
    }
}
