@extends('admin.layouts.form')

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <!-- Add any alerts or messages here -->
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            <i class="material-icons btn btn-sm btn-warning">create</i> <span> &nbsp; Create New Bank Account</span>
                        </h2>
                        <a href="{!! URL::to('module/bank') !!}" class="pull-right">Back to List</a>
                    </div>
                    <div class="body">
                        {!! Form::open(['url' => url('module/bank'), 'class' => 'form']) !!}
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <label for="">Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">edit</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Bank name', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <label for="">Bank Code</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">code</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Bank code', 'required'=>'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <label for="">Account NO</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">edit</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('account_no', null, ['class' => 'form-control', 'placeholder' => 'Account NO']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <label for="">Branch</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">home</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('branch', null, ['class' => 'form-control', 'placeholder' => 'Branch']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::submit('Save', ['class'=>'btn btn-success btn-lg btn-block']) !!}
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
    </script>
@endsection
