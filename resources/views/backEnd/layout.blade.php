<!DOCTYPE html>
<html  lang="{{ trans('backLang.code') }}" dir="{{ trans('backLang.direction') }}">
<head>

    @include('backEnd.includes.head')
    @yield('headerInclude')
    <script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<style>
.selected{
    background-color:#aab7d1;
}
</style>
</head>
<body>

<div class="app" id="app">

    <!-- ############ LAYOUT START-->

    <!-- aside -->
    @include('backEnd.includes.menu')
            <!-- / aside -->

    
    <div id="content" class="app-content box-shadow-z0" role="main">
        @include('backEnd.includes.header')
        @include('backEnd.includes.footer')
        <div ui-view class="app-body" id="view">

            
                @include('backEnd.includes.errors')
                @yield('content')
            

        </div>
    </div>
    <!-- / -->



</div>

    <script>


    var editor_config = {
        path_absolute : "{{ URL::to('/') }}/",
        selector: "textarea",
        branding: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };
    tinymce.init(editor_config);
</script>


@include('backEnd.includes.foot')
    
<script type="text/javascript"  src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript"  src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script type="text/javascript"  src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript"  src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript"  src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript"  src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript"  src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js
"></script>



<script src="{{ URL::to("backEnd/libs/js/iconpicker/fontawesome-iconpicker.js") }}"></script>
    <script>
        $(function () {
            $('.icp-auto').iconpicker({placement: '{{ (trans('backLang.direction')=="rtl")?"topLeft":"topRight" }}'});
        });
    </script>

    <script type="text/javascript"  src="{{ asset('js/bootstrap.min.js') }}"></script>

    


    <script type="text/javascript"  src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

    <script type="text/javascript"  src="{{ asset('js/script.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



    
@yield('footerInclude')

    <script type="text/javascript">
        $(document).ready(function(){

            $(".dataTables_filter,.dt-buttons,.dataTables_info,.dataTables_paginate,.dataTables_length").css("padding","10px");
        
        })

    </script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('css/image_style.css') }}">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/image_style.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    
</body>
</html>
