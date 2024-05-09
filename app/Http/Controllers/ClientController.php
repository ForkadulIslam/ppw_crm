<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('RedirectIfNotAuthenticate');
    }
    public function index()
    {
        $results = Client::orderBy('id','desc')->paginate(10);

        return view('admin.modules.client.client_list', compact('results'));
    }
    public function create(){
        $companies = Company::pluck('name','id');
        return view('admin.modules.client.create', compact('companies'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        //return $request->all();
        Client::create($request->all());
        return redirect('module/client')->with('message', 'Client has been created');
    }

    // Display the specified resource.
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $companies = Company::pluck('name','id');
        return view('admin.modules.client.edit', compact('companies','client'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return redirect('module/client')->with('message', 'Client has been updated');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
