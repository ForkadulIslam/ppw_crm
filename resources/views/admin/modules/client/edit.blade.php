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
                            <i class="material-icons btn btn-sm btn-warning">create</i> <span> &nbsp; Edit Client</span>
                        </h2>
                        <a href="{!! URL::to('module/client') !!}" class="pull-right">Back to List</a>
                    </div>
                    <div class="body">
                        {!! Form::model($client,['url' => url('module/client',$client->id), 'class' => 'form', 'files' => 'true']) !!}
                        @method('PATCH')
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="code">Client Code</label>
                                    {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Enter Client Code', 'required']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name">Client Name</label>
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Client Name', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
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
