@extends('layouts.app')
@section('content')
<div class="content-header"></div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="card-title">All Articles</h3>
                            </div>
                            <div class="col-sm-3 text-right">
                                <a href="{{ route('article.create') }}" class="btn btn-sm- btn-primary">Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mt-2">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->get_created_by->name }}</td>
                                            <td>
                                                <div class="action">
                                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-xs btn-warning">
                                                        <i class="fa fa-eye "></i>
                                                    </a>
                                                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-xs btn-success">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-xs btn-danger" onclick="swal_delete('{{ route('article.delete', $article->id) }}')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 mt-2">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection