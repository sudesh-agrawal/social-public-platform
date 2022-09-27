@extends('layouts.app')
@section('content')
<div class="content-header"></div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Article</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td><b>Title</b></td>
                                    <td>{{ $article->title }}</td>
                                </tr>
                                <tr>
                                    <td><b>Short Description</b></td>
                                    <td>{{ $article->short_description }}</td>
                                </tr>
                                <tr>
                                    <td><b>Description</b></td>
                                    <td>{!! $article->description !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Images</b></td>
                                    <td>
                                        @if(count($article->get_upload_image) > 0)
                                            <ul class="pl-0">
                                                @foreach($article->get_upload_image as $val)
                                                    @php
                                                        $name = explode('/', $val->image_name);
                                                        $name = end($name);
                                                    @endphp
                                                    <li style="list-style-type: none;"><b><a href="{{ asset($val->image_name) }}" target="_blank" class="color-black">{{ $name }}</a></b></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.label {
    display: inline;
    padding: 0.2em 0.6em 0.3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25em;
}
.label-info {
    background-color: #5bc0de;
}
.bootstrap-tagsinput{
    width: 100%;
}
.color-black{
    /*color*/: #000;
}
</style>
@endsection