<?php

namespace App\Http\Controllers;

use App\Models\Credit_account;
use Illuminate\Http\Request;

class CreditAccountController extends Controller
{
    public function __construct(){
        $this->middleware('RedirectIfNotAuthenticate');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Credit_account::orderBy('code','asc')->paginate(20);
        return view('admin.modules.credit_account.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.credit_account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Credit_account::create($request->all());
        return redirect()->to('module/credit_account')->with('message','Credit account created');
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
        $result = Credit_account::find($id);
        return view('admin.modules.credit_account.edit',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Credit_account::find($id)->fill($request->all())->save();
        return redirect()->to('module/credit_account')->with('message','Credit account updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
