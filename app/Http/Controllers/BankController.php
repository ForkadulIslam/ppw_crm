<?php

namespace App\Http\Controllers;

use App\Models\Bank_account;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct(){
        $this->middleware('RedirectIfNotAuthenticate');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Bank_account::orderBy('code','asc')->paginate(20);
        return view('admin.modules.bank.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Bank_account::create($request->all());
        return redirect()->to('module/bank')->with('message','Bank account created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = Bank_account::find($id);
        return view('admin.modules.bank.edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Bank_account::find($id)->fill($request->all())->save();
        return redirect()->to('module/bank')->with('message','Bank account updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
