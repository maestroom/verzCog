@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book marked</div>

                <div class="panel-body">
    <div class="padding">
        <div class="box">

            <div class="box-body">



<?php
                       print_R($BookmarkedEvent);
                       echo "</br>";
                       print_R($BookmarkedResources);
                       echo "</br>";
                       print_R($BookmarkedStories);
                       ?>


            
            </div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footerInclude')


@endsection









