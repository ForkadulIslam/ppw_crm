<?php

namespace App\Http\Controllers;

use App\Imports\StatementImport;
use App\Models\Bank_statement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BankStatementController extends Controller
{
    public function __construct(){
        $this->middleware('RedirectIfNotAuthenticate');
    }

    public function index(){
        $results = Bank_statement::orderBy('statement_sl','desc')->paginate(20);
        return view('admin.modules.bank_statement.index',compact('results'));
    }

    public function create(){
        return view('admin.modules.bank_statement.import');
    }
    public function store(Request $request){
        request()->validate([
            'statement_data' => 'required|mimes:xlsx|max:2048'
        ]);
        try {
            Excel::import(new StatementImport(), $request->file('statement_data'));
            return redirect()->back()->with('success', 'Data processing is done');
        }catch (\Exception $exception){
            return redirect()->back()->with('error_message',$exception->getMessage());
        }
    }
    public function edit($bank_statement_id){
        $result = Bank_statement::find($bank_statement_id);
        //return $result;
        return view('admin.modules.bank_statement.edit',compact('result'));
    }
    public function update(Request $request, $statement_id){
        Bank_statement::find($statement_id)->fill($request->all())->save();
        return redirect()->to('module/statement')->with('success','Statement has been updated');
    }
    public function search(Request $request){
        $query = Bank_statement::query();

        if ($request->get('from') !== null) {
            $query->whereDate('transaction_date', '>=', $request->input('from'));
        }


        if ($request->get('to') !== null ) {
            $query->whereDate('transaction_date', '<=', $request->input('to'));
        }
        if ($request->get('bank_code') !== null ) {
            $query->where('bank_code', '<=', $request->input('bank_code'));
        }

        $results = $query->orderBy('statement_sl','desc')->paginate(20);
        return view('admin.modules.bank_statement.index',compact('results'));
    }
}
