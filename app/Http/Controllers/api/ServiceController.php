<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Services::all();

        return response()->json($service);

        //return view('api.Services.index', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'service_name' => 'required',
            'category' => 'required',
            'description' => 'nullable',
        ]);

        Services::create($request->all());

        // $input = $request->all();
        // $service = Services::create($input);
        // return response()->json($service);
        // $service = new Services([

        // 'service_name' => $request->get('service_name'),
        // 'category' => $request->get('category'),
        // 'description' => $request->get('description')
        // ]);


        //$service->save();

        // return new Services($service);

        return redirect()->route('api.Services.index')
            ->with('success', 'Service created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('api.services.show');
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
        return view('api.services.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('destroy.blade.php');
    }
}
