@extends('admin.layouts.form')
@section('custom_page_style')
    <style>
        .header .input-group{
            margin-bottom: 0!important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2 class="">
                <i class="material-icons btn btn-sm btn-warning">list</i> <span>&nbsp; Work-order List
            </h2>
        </div>

        <!-- Striped Rows -->
        <div class="row clearfix" id="app">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        {!! Form::open(['url'=>url('module/work_order/search'),'class'=>'form']) !!}
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">calendar_month</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('from',request()->from,['class'=>'form-control datepicker', 'placeholder'=>'From date']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">calendar_month</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('to',request()->to,['class'=>'form-control datepicker', 'placeholder'=>'To date']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">list</i></span>
                                    {!! Form::select('company',\App\Models\Company::pluck('name','id'),request()->company,['class'=>'form-control selectpicker','placeholder'=>'All Company']) !!}
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">list</i></span>
                                    {!! Form::select('client',\App\Models\Client::pluck('name','id'),request()->client,['class'=>'form-control selectpicker', 'placeholder'=>'All Client']) !!}
                                </div>
                            </div>
                            <div class="col-xs-4">
                                {!! Form::submit('SEARCH',['class'=>'btn btn-md btn-success btn-block']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="bg-teal">
                            <tr>
                                <th>PPW ID</th>
                                <th>WO Code</th>
                                <th>Sub O</th>
                                <th>Company</th>
                                <th>Client</th>
                                <th>Receive date</th>
                                <th>Contractor</th>
                                <th>Work type</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Processor</th>
                                <th>Inv Date</th>
                                <th>Seller</th>
                                <th>Client Amount</th>
                                <th>Vendor Amount</th>
                                <th>Cash In</th>
                                <th>Cash Out</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$result)
                                <tr class="font-12">
                                    <td scope="row">{!! $result->ppw_id !!}</td>
                                    <td scope="row">{!! $result->work_order_code !!}</td>
                                    <td scope="row">{!! $result->sub_order_no !!}</td>
                                    <td scope="row">{!! $result->companyDetails ? $result->companyDetails->name : 'N/A' !!}</td>
                                    <td scope="row">{!! $result->clientDetails? $result->clientDetails->name : 'N/A' !!}</td>
                                    <td scope="row">{!! $result->receive_date !!}</td>
                                    <td scope="row">{!! $result->contractor !!}</td>
                                    <td scope="row">{!! $result->work_type !!}</td>
                                    <td scope="row">{!! $result->city !!}</td>
                                    <td scope="row">{!! $result->state !!}</td>
                                    <td scope="row">{!! $result->zip !!}</td>
                                    <td scope="row">{!! $result->processor !!}</td>
                                    <td scope="row">{!! $result->invoice_date !!}</td>
                                    <td scope="row">{!! $result->seller !!}</td>
                                    <td scope="row">{!! $result->client_amount !!}</td>
                                    <td scope="row">{!! $result->vendor_amount !!}</td>
                                    <td scope="row">{!! $result->total_cash_in !!}</td>
                                    <td scope="row">{!! $result->total_cash_out !!}</td>
                                    <td scope="row">
                                        <a data-toggle="tooltip" data-title="Edit"
                                           class="btn btn-xs btn-info" href="{!! URL::to('module/work_order/'.$result->id.'/edit') !!}">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $results->appends(request()->all())->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->
    </div>
@endsection
@section('custom_page_script')
    <script type="text/javascript">

        $(document).ready(function(){
            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'Y-MM-DD',
                clearButton: true,
                weekStart: 1,
                time: false
            });
            $('[data-toggle = tooltip]').tooltip();
        })

        var app = new Vue({
            el:'#app',
            data:{
                month: ''
            },
            methods:{

                on_change:function(){
                    let encoded = '?month='+encodeURIComponent(this.month).replace(/%20/g,'+')
                    window.location.href='{!! url('module/work_order') !!}?month='+this.user_id+encoded;
                }

            },
        });




    </script>
@endsection
