@extends('frontend.app')

@section('content')
<div class="row">
    <div class="col-lg-12 my-3">
        <div class="pull-right">
            <div class="btn-group">
                <button class="btn btn-info mr-2" id="list">
                    <i class="fa fa-list"></i>
                </button>
                <button class="btn btn-danger" id="grid">
                    <i class="fa fa-th-large"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div id="products" class="row view-group">
    @if(count($articles) > 0)
        @foreach($articles as $key => $article)
            <div class="item col-xs-4 col-lg-4">
                <div class="thumbnail card">
                    <div class="img-event">
                        <img class="group list-group-image img-fluid" src="{{ (count($article->get_upload_image) > 0) ? asset($article->get_upload_image[0]->image_name) : asset('frontend/no-image.png') }}" alt="" />
                    </div>
                    <div class="caption card-body">
                        <h4 class="group card-title inner list-group-item-heading">
                            {{ $article->title }}
                        </h4>
                        <p class="group inner list-group-item-text">
                            @if(strlen($article->short_description) > 100)
                                {{ $article->short_description }}
                            @else
                                {{ $article->short_description }}
                            @endif
                        </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <small>Posted by: {{ $article->get_created_by->name }}</small>
                                <br>
                                <small>Posted at: {{ date('M d, Y', strtotime($article->created_at)) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No data found</p>
    @endif
</div>
<div class="pagination">
    {{ $articles->links() }}
</div>
<style type="text/css">
    .view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
}
.thumbnail
{
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
    min-height: 400px;
    max-height: 400px;
    overflow-y: auto;
}
.list-group-item .thumbnail{
    min-height: unset;
    max-height: unset;
}
.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
}
.item.list-group-item .img-event {
    float: left;
    width: 30%;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
    display: inline-block;
    width: 100%;
}
.item.list-group-item .caption
{
    float: left;
    width: 70%;
    margin: 0;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item:after
{
    clear: both;
}
.grid-group-item .list-group-image{
    min-height: 200px;
    max-height: 200px;
    min-width: 100%;
}
/* Firefox */
* {
    scrollbar-width: thin;
    scrollbar-color: #ada7ae #ffffff;
}

/* Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 11px;
}

*::-webkit-scrollbar-track {
    background: #ffffff;
}

*::-webkit-scrollbar-thumb {
    background-color: #ada7ae;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });
</script>
@endsection