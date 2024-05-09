@extends('admin.layouts.form')
@section('custom_page_style')
    <style>

        .searchable_dropdown.open .dropdown-menu.inner{
            padding-left: 30px!important;
            margin-left: 10px!important;
        }
        .bootstrap-select .bs-searchbox, .bootstrap-select .bs-actionsbox, .bootstrap-select .bs-donebutton{
            padding: 0 0 5px 10px;
            border-bottom: 1px solid #e9e9e9;
            margin-left: 37px;
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="block-header clearfix">
            <h2 class="pull-left">
                <i class="material-icons btn btn-sm btn-warning">create</i> <span> &nbsp; Edit Statement</span>
            </h2>
            <a href="{!! URL::to('module/statement') !!}" class="pull-right">Back to List</a>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        {!! Form::model($result,['url' => url('module/bank_statement',$result->id), 'class' => 'form']) !!}
                        @method('PATCH')
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <label for="">Bank Sl NO.</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">list</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('statement_sl', null, ['class' => 'form-control', 'placeholder' => 'Bank SL NO....', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12">
                                <label for="">Transaction Date</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('transaction_date', null, ['class' => 'form-control datepicker', 'placeholder' => 'Date', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12">
                                <label for="">Description</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">edit</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description...', 'required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="">Amount</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">money</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Amount..', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="">Balance</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">money</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('balance', null, ['class' => 'form-control', 'placeholder' => 'Balance..', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="">PPW ID</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('ppw_id', null, ['class' => 'form-control', 'placeholder' => 'PPW ID..', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="">PPW Amount</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">money</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('ppw_amount', null, ['class' => 'form-control', 'placeholder' => 'Amount..', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="">Bank Code</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">money</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::select('bank_code',\App\Models\Bank_statement::pluck('bank_code','bank_code'),null,['class'=>'form-control selectpicker','placeholder'=>'Bank Code']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::submit('Update', ['class'=>'btn btn-success btn-lg btn-block']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_page_script')
    <script type="text/javascript">
        // Add any custom scripts if needed
        $(document).ready(function(){
            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'Y-MM-DD',
                clearButton: true,
                weekStart: 1,
                time: false
            });


        })
    </script>
@endsection
