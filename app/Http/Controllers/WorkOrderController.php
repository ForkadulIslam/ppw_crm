<?php

namespace App\Http\Controllers;


use App\Imports\WorkOrderImport;
use App\Models\Client;
use App\Models\Company;
use App\Models\Work_order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkOrderController extends Controller
{
    public function __construct(){
        $this->middleware('RedirectIfNotAuthenticate');
    }
    public function index(){
        $results = Work_order::orderBy('id','desc')->paginate(10);
        $results->each(function($item){
            $item->total_cash_in = $item->bankStatement->where('ppw_amount', '>', 0)->sum('ppw_amount');
            $item->total_cash_out = $item->bankStatement->where('ppw_amount', '<', 0)->sum('ppw_amount');
        });
        //return $results;
        return view('admin.modules.work_order.index', compact('results'));
    }
    public function create(){
        return view('admin.modules.work_order.import');
    }
    public function store(Request $request){
        request()->validate([
            'attendance_data' => 'required|mimes:xlsx|max:2048'
        ]);
        Excel::import(new WorkOrderImport(), $request->file('attendance_data'));
        return redirect('module/work_order')->with('message', 'Data processing is done');
    }
    public function search(Request $request){

        $query = Work_order::query();

        if ($request->get('from') !== null) {
            $query->whereDate('receive_date', '>=', $request->input('from'));
        }


        if ($request->get('to') !== null ) {
            $query->whereDate('receive_date', '<=', $request->input('to'));
        }

        if ($request->get('company') !== null) {
            //return $request->company;
            $query->where('company_id', $request->input('company'));
        }

        if ($request->get('client') !== null) {
            //return $request->client;
            $query->where('client_id', $request->input('client'));
        }
        $results = $query->orderBy('id','desc')->paginate(20);
        return view('admin.modules.work_order.index', compact('results'));
    }
    public function edit($work_order_id){
        $result = Work_order::find($work_order_id);
        $contractors = Work_order::where('contractor','!=', null)->groupBy('contractor')->pluck('contractor','contractor');
        $seller = Work_order::where('seller','!=', null)->groupBy('seller')->pluck('seller','seller');
        $work_type = Work_order::where('work_type','!=', null)->groupBy('work_type')->pluck('work_type','work_type');
        $processor = Work_order::where('processor','!=', null)->groupBy('processor')->pluck('processor','processor');
        $cities = Work_order::where('city','!=', null)->groupBy('city')->pluck('city','city');
        $states = Work_order::where('state','!=', null)->groupBy('state')->pluck('state','state');
        $zip_codes = Work_order::where('zip','!=', null)->groupBy('zip')->pluck('zip','zip');
        $clients = Client::pluck('name','id');
        $companies = Company::pluck('name','id');
        return view('admin.modules.work_order.edit',compact('result','contractors','seller','work_type', 'processor','clients','companies','cities','states','zip_codes'));
    }
    public function update(Request $request, $work_order_id){
        $client_code = Client::find($request->client_id)->code;
        $company_code = Company::find($request->company_id)->code;
        $final_client_code = $company_code + $client_code;
        $workOrderData = [
            'client' => $final_client_code,
            'client_id' => $request->client_id,
            'company_id' => $request->company_id,
            'company_code' => $company_code,
            'sub_order_no' => $request->sub_order_no,
            'receive_date' => $request->receive_date,
            'work_order_code' => $request->work_order_code,
            'contractor' => $request->contractor,
            'work_type' => $request->work_type,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'processor' => $request->processor,
            'invoice_date' => $request->invoice_date,
            'seller' => $request->seller,
            'source_ppw' => $request->source_ppw,
            'client_amount' => $request->client_amount,
            'vendor_amount' => $request->vendor_amount,
        ];
        Work_order::find($work_order_id)->fill($workOrderData)->save();
        return redirect('module/work_order')->with('message', 'Work order updated successfully');
    }
}
