<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service_listing;
use App\Models\service_request;
use App\Models\Services;
use DB;

class ServiceListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
   {
    $this->middleware('auth:api')->except(['index', 'show']);
   }

    public function index()
    {
        // $category= $request->input('category');

        // $service_listing = service_listing::select('*')
        //     ->join('services', 'service_listings.category', '=', 'services.category')
        //     ->select('service_listings.*', 'services.category')
        //     ->where('services.category',$category)
        //     ->get();
        $service_listing = service_listing::all();

        return response()->json($service_listing);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
