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
                <i class="material-icons btn btn-sm btn-warning">list</i> <span>&nbsp; Statement List
            </h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>


        <!-- Striped Rows -->
        <div class="row clearfix" id="app">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        {!! Form::open(['url'=>url('module/statement/search'),'class'=>'form']) !!}
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">calendar_month</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('from',request()->from,['class'=>'form-control datepicker', 'placeholder'=>'From date']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">calendar_month</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('to',request()->to,['class'=>'form-control datepicker', 'placeholder'=>'To date']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">list</i></span>
                                    {!! Form::select('bank_code',\App\Models\Bank_statement::pluck('bank_code','bank_code'),request()->bank_code,['class'=>'form-control selectpicker','placeholder'=>'Bank Code']) !!}
                                </div>
                            </div>
                            <div class="col-xs-3">
                                {!! Form::submit('SEARCH',['class'=>'btn btn-md btn-success btn-block']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="bg-teal">
                            <tr>
                                <th>SL NO</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Balance</th>
                                <th>PPW ID</th>
                                <th>PPW Amount</th>
                                <th>Bank Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$result)
                                <tr class="font-12">
                                    <td scope="row">{!! $result->statement_sl !!}</td>
                                    <td scope="row">{!! $result->transaction_date !!}</td>
                                    <td scope="row">{!! $result->description !!}</td>
                                    <td scope="row">{!! $result->amount !!}</td>
                                    <td scope="row">{!! $result->balance !!}</td>
                                    <td scope="row">{!! $result->ppw_id !!}</td>
                                    <td scope="row">{!! $result->ppw_amount !!}</td>
                                    <td scope="row">{!! $result->bank_code !!}</td>
                                    <td scope="row">
                                        <a data-toggle="tooltip" data-title="Edit"
                                           class="btn btn-xs btn-info" href="{!! URL::to('module/statement/'.$result->id.'/edit') !!}">
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
