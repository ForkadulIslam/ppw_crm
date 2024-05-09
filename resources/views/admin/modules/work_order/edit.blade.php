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
                <i class="material-icons btn btn-sm btn-warning">create</i> <span> &nbsp; Edit Work Order</span>
            </h2>
            <a href="{!! URL::to('module/work_order') !!}" class="pull-right">Back to List</a>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        {!! Form::model($result,['url' => url('module/work_order',$result->id), 'class' => 'form']) !!}
                        @method('PATCH')
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <label for="">Work Order Code</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">code</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('work_order_code', null, ['class' => 'form-control', 'placeholder' => 'Work order code', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <label for="">Sub order</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">code</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('sub_order_no', null, ['class' => 'form-control', 'placeholder' => 'Sub order no if any']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="">Client</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::select('client_id',$clients, null, ['class' => 'searchable_dropdown', 'id'=>'searchable_dropdown', 'placeholder' => 'Select Client', 'required'=>'required', 'data-dropup-auto'=>'false', 'data-width'=>'100%','data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="">Company</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::select('company_id',$companies, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%', 'placeholder' => 'Select Company', 'required'=>'required', 'data-dropup-auto'=>'false', 'data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="">Receive Date</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::text('receive_date', null, ['class' => 'form-control datepicker', 'placeholder' => 'Receive date', 'required'=>'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="">Invoice Date</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::text('invoice_date', null, ['class' => 'form-control datepicker', 'placeholder' => 'Receive date']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="row ">
                                    <div class="col-xs-6 faefasf">
                                        <label for="">Contractor</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="clearfix">
                                                {!! Form::select('contractor',$contractors, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%', 'placeholder' => '--Select Contractor--', 'data-dropup-auto'=>'false', 'data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="">Seller</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::select('seller',$seller, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%', 'placeholder' => '--Select Seller--', 'data-dropup-auto'=>'false', 'data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="">Work type</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::select('work_type',$work_type, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%', 'placeholder' => '--Select Seller--', 'data-dropup-auto'=>'false','data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="">Processor</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::select('processor',$processor, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%','data-live-search'=>'true', 'placeholder' => '--Processor--', 'required'=>'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="">Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">edit</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Receive date', 'required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="row ">
                                    <div class="col-xs-4">
                                        <label for="">City</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="">
                                                {!! Form::select('city',$cities, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%', 'placeholder' => '--Select City--','required'=>'required', 'data-dropup-auto'=>'false', 'data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="">State</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::select('state',$states, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%', 'placeholder' => '--Select State--', 'required'=>'required', 'data-dropup-auto'=>'false', 'data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="">ZIP</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::select('zip',$zip_codes, null, ['class' => 'searchable_dropdown selectpicker', 'data-width'=>'100%', 'placeholder' => '--Select ZIP--', 'required'=>'required','data-live-search'=>'true']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="">Source PPW</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">code</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('source_ppw', null, ['class' => 'form-control', 'placeholder'=>'Source PPW']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="">Client amount</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">money</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::text('client_amount', null, ['class' => 'form-control', 'placeholder'=>'Client amount', 'required'=>'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="">Vendor amount</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">money</i>
                                            </span>
                                            <div class="form-line">
                                                {!! Form::text('vendor_amount', null, ['class' => 'form-control', 'placeholder'=>'Vendor amount', 'required'=>'required']) !!}
                                            </div>
                                        </div>
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
