@extends('admin.layouts.form')
@section('custom_page_style')
    <style>

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error_message'))
                <div class="alert alert-danger">
                    {{ session('error_message') }}
                </div>
            @endif
        </div>
        <!-- Color Pickers -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            <i class="material-icons btn btn-sm btn-warning">list</i> <span>&nbsp; Upload Bank statement (CSV, xlsx)</span>
                        </h2>
                        <a href="{!! URL::to('module/bank_statement') !!}" class="pull-right">Transaction List</a>
                    </div>
                    <div class="body" id="app">
                        {!! Form::open(['url'=>URL::to('module/bank_statement'),'class'=>'form','files'=>'true',]) !!}
                        <div class="row clearfix">
                            <div class="col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Bulk upload</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                @error('statement_data')
                                                <div class="error">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                                <label for="file">File</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons">attach_file</i></span>
                                                    {!! Form::file('statement_data',['class'=>'form-control', 'required'=>'true','id'=>'file']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <input type="submit" name="submit" value="UPLOAD" class="btn btn-success btn-sm btn-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Color Pickers -->

    </div>
@endsection
@section('custom_page_script')

@endsection
