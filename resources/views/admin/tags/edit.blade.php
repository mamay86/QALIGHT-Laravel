@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Tag</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('tags.index') }}" title="All tags">
                    <button class="btn btn-sm btn-outline-success"><span data-feather="arrow-left"></span>
                        Go Back</button>
                </a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>

            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <form action="{{ route('tags.update',['id' => $tag->id]) }}" method="post">
            @method("PUT")
            @csrf
            <div class="card">
                <div class="card-block">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input name="name" class="form-control" type="text" value="{{ $tag->name }}" placeholder="title of article">
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection