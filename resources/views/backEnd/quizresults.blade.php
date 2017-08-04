@extends('backEnd.layout')
@section('content')


<style>
.selected{
    background-color:#aab7d1;
}
</style>

    <div class="padding">
        <div class="box">


            <div class="box-header dker">
<!--                 <h3>{{ trans('backLang.users') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                    
                </small> -->

            <?php if(!empty($FinalArray)){?>
                {{Form::open(['route'=>'usersStoreCsr','method'=>'post'])}}

                <div class="table-responsive">

                                <table id="example1" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Quiz year</th>
                            <th>User Name</th>                            
                            <th>Question Answer</th>
                            <th>Invest Percent</th>
                            <th>Integration Percent</th>
                            <th>Institution Percent</th>
                            <th>Impact Percent</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($FinalArray as $key=>$value)

                                

                                <tr>
                                <td>
                                @foreach($value as $key1=>$value1)
                                {!! $key1 !!}
                                @endforeach
                                
                                </td>
                                <td>
                                        @foreach($value as $key1=>$value1)
                                            @foreach($value1 as $key2=>$value2)                     
                                                {!! $key2   !!}
                                            @endforeach
                                        @endforeach
                                </td>
                                <td>
                                        @foreach($value as $key1=>$value1)
                                            @foreach($value1 as $key2=>$value2)  
                                                @foreach($value2 as $key3=>$value3)                   
                                                    @if($key3=='question_answer')
                                                        @foreach($value3 as $key4=>$value4)
                                                                            
                                                            Question Id {!! $key4 !!}:<b style="color:red;">{!! implode(" ",$value4); !!}</b> 
                                                                            
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                </td>
                                
                                        @foreach($value as $key1=>$value1)
                                            @foreach($value1 as $key2=>$value2)  
                                                @foreach($value2 as $key3=>$value3)                   
                                                    @if($key3=='quiz_result')
                                                        @foreach($value3 as $key4=>$value4)
                                                                            
                                                            <td>
                                                                            {!! $value4   !!}
                                                            </td>
                                                                            
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach

                                    <td class="text-center">
                                       @if($CheckLayoutPermission[0]->delete===1)

                                                    @if($CheckLayoutPermission[0]->delete===1)
                                                    <a class="btn btn-sm warning"
                                                       href="{{ route("quizresultsDestroy",["id"=>$key]) }}">
                                                       <small><span class="glyphicon glyphicon-trash"></span>
                                                            </small>
                                                    </a>
                                                    @endif                

                                        @endif
                                   </td>
                                
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{Form::close()}}
            <?php }?>
        </div>
    </div>
@endsection
@section('footerInclude')
    
    














    <script type="text/javascript">
    $(document).ready(function(){

            //$('#example, #example1').DataTable();

    var all_ids = [];
    var table = $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
    });


    $(".dataTables_filter,.dt-buttons,.dataTables_info,.dataTables_paginate").css("padding","10px");
    
/*   $('thead input[name="select_all"]').on('click', function(e){
      if(this.checked){
         $('#example1 tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example1 tbody input[type="checkbox"]:checked').trigger('click');
      }
  });*/

    })
       
    </script>
    <script type="text/javascript">
    // For demo to fit into DataTables site builder...
/*    $('#example1')
        .removeClass('display')
        .addClass('table table-striped table-bordered');*/




</script>
@endsection
