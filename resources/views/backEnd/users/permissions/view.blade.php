<div class="padding">
    <div class="box">


        <div class="box-header dker">
            <h3>{{ trans('backLang.permissions') }}</h3>
            <small>
                <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a>
                
            </small>
        </div>

        @if($CheckLayoutPermission[0]->create===1)
      
        <div class="row p-a pull-right" style="margin-top: -70px;">
            <div class="col-sm-12">
                <a class="btn btn-fw danger" href="{{route("permissionsCreate")}}">
                    <i class="material-icons">&#xe03b;</i>
                    &nbsp; {{ trans('backLang.newPermissions') }}
                </a>
            </div>
        </div>
        @endif
        <div class="table-responsive">
            @if(!empty($role_array))
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    
                    <th>Role Name</th>
                    <th>Modules</th>
                    <th>Role Access</th>
                    <th class="text-center" style="width:200px;">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($role_array as $key=>$value)
                            <tr>
                                    <td>
                                        {!! $key   !!}
                                    </td>

                                    <td>
                                        <small><?php echo implode(", ",$role_array[$key]["modules"]);?></small>
                                    </td>
                                    <td>
                                        <small><?php echo implode(", ",$role_array[$key]["Access"]);?></small>

                                    </td>
                                    <td>
                                    @if($CheckLayoutPermission[0]->edit===1)
                                        <a class="btn btn-sm success"
                                           href="{{ route("permissionsEdit",["id"=>$role_array[$key]["id"][0]]) }}">
                                            <small><span class="glyphicon glyphicon-pencil"></span>
                                            </small>
                                        </a>
                                    @endif    
                                    @if($CheckLayoutPermission[0]->delete===1)
                                        <a class="btn btn-sm warning"
                                           href="{{ route("permissionsDestroy",["id"=>$role_array[$key]["id"][0]]) }}">
                                            <small><span class="glyphicon glyphicon-trash"></span>
                                            </small>
                                        </a>
                                    @endif 
                                 
                                    </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

    </div>
</div>