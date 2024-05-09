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
                            <i class="material-icons btn btn-sm btn-warning">create</i> <span> &nbsp; All Bank accounts</span>
                        </h2>
                        <a href="{!! URL::to('module/bank/create') !!}" class="pull-right">Create New account</a>
                    </div>

                    <div class="body">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <p>TOTAL : {!! $results->total() !!}</p>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="bg-teal">
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Account NO</th>
                                <th>Branch</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$result)
                                <tr class="font-12">
                                    <td>{!! $result->name !!}</td>
                                    <td>{!! $result->code !!}</td>
                                    <td>{!! $result->account_no !!}</td>
                                    <td>{!! $result->branch !!}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-title="Edit & Preview" class="btn btn-xs btn-warning" href="{!! URL::to('module/bank/'.$result->id,'edit') !!}"><i class="material-icons">edit</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $results->links() !!}
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
