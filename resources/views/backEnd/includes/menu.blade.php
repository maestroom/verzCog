<?php

$fullPagePath = Request::url();

$envAdminCharCount = strlen(env('BACKEND_PATH')) + 1;

$urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, env('BACKEND_PATH')) + $envAdminCharCount);
?>

<div id="aside" class="app-aside modal fade folded md nav-expand">
    <div class="left navside dark dk" layout="column">
        <div class="navbar navbar-md no-radius" style="min-height: 3rem !important;">
            <a class="navbar-brand" href="{{ route('adminHome') }}">
                <span class="hidden-folded inline">Company of Good</span>
            </a>
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-active-primary">

                <ul class="nav" ui-nav>


                            <li>
                                <a href="{{ route('tracking') }}" onclick="location.href='{{ route('tracking') }}'">

                                    <span class="nav-text">Dashboard</span>
                                </a>
                            </li>

                           
                            @foreach($CheckViewMenuPermission as $check_view_menu_permission)
                            <?php $name = $check_view_menu_permission->name; ?>
                            <li>
                                <a href="{{ route($name) }}" onclick="location.href='{{ route($name) }}'" >

                                    <span class="nav-text">{{$check_view_menu_permission->label}}</span>
                                </a>
                            </li>

                            @endforeach


                </ul>
            </nav>
        </div>
        <div flex-no-shrink>
            <div>
                <nav ui-nav>
                    <ul class="nav">
                        <li>
                            <div class="b-b b m-t-sm"></div>
                        </li>
                        <li class="no-bg">
                            <a href="{{ url('/logout') }}">
                            <span class="nav-icon glyphicon glyphicon-off"></span>
                            <span class="nav-text">{{ trans('backLang.logout') }}</span></a>
                            
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>