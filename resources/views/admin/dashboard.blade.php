﻿@extends('admin.layouts.form')
@section('custom_page_style')
    <style>
        table td{
            vertical-align: middle!important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid" id="app">
        <div class="block-header">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW ORDER</div>
                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-purple hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL CLIENT</div>
                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL RECEIVED</div>
                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PAYMENT</div>
                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-blue hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL IN BANK</div>
                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL EXPENSE</div>
                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20">0</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <h5 class="">Welcome on Board</h5>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <table class="table table-bordered table-striped font-12 bg-grey">
                                    <thead>
                                    <tr class="bg-grey">
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('custom_page_script')
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

    <script>
        var app = new Vue({
            el:'#app',
            data:{
                selectedStatus: '',
                url: '{!! url("module/update_leave_status") !!}'
            },
            methods:{
                on_update_status: function(leaveId) {
                    console.log('Selected Status:', this.selectedStatus);
                    axios.get(this.url+'/'+leaveId+'/'+this.selectedStatus).then(response => {
                        window.location.reload();
                    }).catch(error => {
                        console.error('Error updating status:', error);
                    });
                }
            },
        });
    </script>
@endsection
