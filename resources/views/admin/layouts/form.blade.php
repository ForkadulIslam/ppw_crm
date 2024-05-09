<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PPW ACCOUNT CRM</title>

    <!-- Favicon-->
    <link rel="icon" href="{!! generate_asset_url('favicon.ico') !!}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{!! generate_asset_url('plugins/bootstrap/css/bootstrap.css') !!}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{!! generate_asset_url('plugins/node-waves/waves.css') !!}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{!! generate_asset_url('plugins/animate-css/animate.css') !!}" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="{!! generate_asset_url('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') !!}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{!! generate_asset_url('plugins/dropzone/dropzone.css') !!}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{!! generate_asset_url('plugins/multi-select/css/multi-select.css') !!}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{!! generate_asset_url('plugins/jquery-spinner/css/bootstrap-spinner.css') !!}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{!! generate_asset_url('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{!! generate_asset_url('plugins/bootstrap-select/css/bootstrap-select.css') !!}" rel="stylesheet" />

    <!-- Bootstrap Datepicker Css -->
    <link href="{!! generate_asset_url('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{!! generate_asset_url('plugins/nouislider/nouislider.min.css') !!}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{!! generate_asset_url('css/style.css') !!}" rel="stylesheet">
    <link href="{!! generate_asset_url('css/snackbar.css') !!}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{!! generate_asset_url('css/themes/all-themes.css') !!}" rel="stylesheet" />
    <link rel="stylesheet" href="{!! generate_asset_url('plugins/sweetalert/sweetalert.css') !!}">
    <style>
        .table tbody tr td{
            vertical-align: middle;
        }
    </style>
    @yield('custom_page_style')
</head>

<body class="theme-red">

<div id="snackbar">Code hasbeen copied...</div>
<!-- Page Loader -->
@include('admin.includes.page_loader')
<!-- Page Loader -->
@include('admin.includes.page_loader')
<!-- Search Bar -->
@include('admin.includes.search_bar')
<!-- #END# Search Bar -->
<!-- Top Bar -->
@include('admin.includes.nav_bar')
<!-- #Top Bar -->
@include('admin.includes.left_menu_bar')


<section class="content">
    @yield('content')
</section>
<?php
$version_no = 1;
?>
<!-- Jquery Core Js -->
<script src="{!! generate_asset_url('plugins/jquery/jquery.min.js?v='.$version_no) !!}"></script>

<!-- Bootstrap Core Js -->
<script src="{!! generate_asset_url('plugins/bootstrap/js/bootstrap.js?v='.$version_no) !!}"></script>

<!-- Select Plugin Js -->
<script src="{!! generate_asset_url('plugins/bootstrap-select/js/bootstrap-select.js?v='.$version_no) !!}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{!! generate_asset_url('plugins/jquery-slimscroll/jquery.slimscroll.js?v='.$version_no) !!}"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="{!! generate_asset_url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js?v='.$version_no) !!}"></script>

<!-- Dropzone Plugin Js -->
<script src="{!! generate_asset_url('plugins/dropzone/dropzone.js?v='.$version_no) !!}"></script>

<!-- Input Mask Plugin Js -->
<script src="{!! generate_asset_url('plugins/jquery-inputmask/jquery.inputmask.bundle.js?v='.$version_no) !!}"></script>

<!-- Multi Select Plugin Js -->
<script src="{!! generate_asset_url('plugins/multi-select/js/jquery.multi-select.js?v='.$version_no) !!}"></script>

<!-- Jquery Spinner Plugin Js -->
<script src="{!! generate_asset_url('plugins/jquery-spinner/js/jquery.spinner.js?v='.$version_no) !!}"></script>

<!-- Bootstrap Tags Input Plugin Js -->
<script src="{!! generate_asset_url('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js?v='.$version_no) !!}"></script>

<!-- noUISlider Plugin Js -->
<script src="{!! generate_asset_url('plugins/nouislider/nouislider.js?v='.$version_no) !!}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{!! generate_asset_url('plugins/node-waves/waves.js?v='.$version_no) !!}"></script>

<!-- Moment Plugin Js -->
<script src="{!! generate_asset_url('plugins/momentjs/moment.js?v='.$version_no) !!}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{!! generate_asset_url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js?v='.$version_no) !!}"></script>

<!-- Custom Js -->
<script src="{!! generate_asset_url('js/admin.js?v='.$version_no) !!}"></script>
<script src="{!! generate_asset_url('js/pages/forms/advanced-form-elements.js?v='.$version_no) !!}"></script>
<script src="{!! generate_asset_url('js/vue.js?v='.$version_no) !!}"></script>
<script src="{!! generate_asset_url('js/axios.js?v='.$version_no) !!}"></script>
<script src="{!! generate_asset_url('js/lodash.js?v='.$version_no) !!}"></script>
<script src="{!! generate_asset_url('plugins/sweetalert/sweetalert.min.js?v='.$version_no) !!}"></script>
<script src="{!! generate_asset_url('js/helpers.js?v='.$version_no) !!}" type="text/javascript"></script>

@yield('custom_page_script')

</body>

</html>
