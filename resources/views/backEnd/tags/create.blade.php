@extends('backEnd.layout')

@section('headerInclude')
    <link href="{{ URL::to("backEnd/libs/js/iconpicker/fontawesome-iconpicker.min.css") }}" rel="stylesheet">


@endsection
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> Add New Tag</h3>
                <small>
                    <a href="{{ route('events') }}">Tags</a> /
                    <a href="">Add New Tag</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("events")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">

{{Form::open(['route'=>['tagsStore'],'id'=>'bootstrapTagsInputForm', 'method'=>'POST', 'files' => true])}}

    <div class="form-group">
        <label>Enter Tags</label>
       
            <input type="text" name="tag_field" class="form-control"
                   value="Investment" data-role="tagsinput" />
        
    </div>

    <div class="form-group">
    <label>Status:</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select>
    </div>


<button type="submit" class="btn btn-default">Submit</button>

  {{Form::close()}}

            </div>
        </div>
    </div>

@endsection

@section('footerInclude')

    
    

    

<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>

@endsection

<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />







